<?php

namespace spkm\FortiNac;

use JsonSerializable;
use LogicException;
use Psr\Http\Message\RequestInterface;
use Saloon\Config;
use Saloon\Enums\Method;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\PendingRequest;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\Traits\Plugins\HasTimeout;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Requests\AdhocBodyRequest;
use spkm\FortiNac\Requests\AdhocRequest;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Resources\AdhocResource;
use spkm\FortiNac\Resources\HasResources;
use spkm\FortiNac\Support\QueryString;

/**
 * The connection to one FortiNAC server: its API token, whether to verify its certificate, timeouts and retries,
 * with a resource for every API FortiNAC documents and ad-hoc calls for anything else.
 */
class FortiNacConnector extends Connector implements HasPagination
{
    use HasResources;
    use HasTimeout;

    protected float $connectTimeout;

    protected float $requestTimeout;

    /**
     * @param  bool|string  $verify  Whether to verify the server's TLS certificate, or the path of a CA bundle to
     *                               verify it against.
     */
    public function __construct(protected string $baseUrl, #[\SensitiveParameter] protected string $token, protected bool|string $verify = true)
    {
        $this->connectTimeout = self::timeout(config('fortinac.timeouts.connect'), Config::$defaultConnectionTimeout);
        $this->requestTimeout = self::timeout(config('fortinac.timeouts.request'), Config::$defaultRequestTimeout);

        if (config('fortinac.retries.times')) {
            $this->tries = (int) config('fortinac.retries.times');
            $this->retryInterval = (int) config('fortinac.retries.interval_ms', 500);
            $this->useExponentialBackoff = true;
            $this->throwOnMaxTries = false;
        }
    }

    /**
     * The API's root: the server's address with /api/v2 appended.
     */
    public function resolveBaseUrl(): string
    {
        return rtrim($this->baseUrl, '/').'/api/v2';
    }

    /**
     * The server's address as configured, without /api/v2.
     */
    public function baseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * Whether the server's certificate is verified, or the CA bundle it is verified against.
     */
    public function verifies(): bool|string
    {
        return $this->verify;
    }

    /**
     * A fingerprint of the token, so that what one token fetched is never served to another (the response cache
     * keys on it) without the token itself being written anywhere.
     */
    public function tokenFingerprint(): string
    {
        return hash('sha256', $this->resolveBaseUrl().'|'.$this->token);
    }

    /**
     * A timeout from config: seconds, or the default when the value is empty or not positive (a zero would mean
     * waiting forever).
     */
    private static function timeout(mixed $value, float $default): float
    {
        return is_numeric($value) && (float) $value > 0 ? (float) $value : $default;
    }

    /**
     * What a dump shows: everything but the token.
     *
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
        return ['baseUrl' => $this->baseUrl, 'token' => '[redacted]', 'verify' => $this->verify];
    }

    /**
     * A connector holds the token, so it is never written out with a queued job or a session; build one from
     * config where it is needed.
     *
     * @return array<string, mixed>
     */
    public function __serialize(): array
    {
        throw new LogicException('A FortiNacConnector cannot be serialised; resolve it from the FortiNac facade or config where it is used.');
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->token);
    }

    /**
     * @return array<string, string>
     */
    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultConfig(): array
    {
        return [
            'verify' => $this->verify,
        ];
    }

    /**
     * Writes the query string as FortiNAC reads it: a parameter with several values repeated, rather than PHP's
     * id[0]=1&id[1]=2.
     */
    public function handlePsrRequest(RequestInterface $request, PendingRequest $pendingRequest): RequestInterface
    {
        $uri = $request->getUri();
        $existing = QueryString::parse((string) parse_url($pendingRequest->getUrl(), PHP_URL_QUERY));

        return $request->withUri($uri->withQuery(QueryString::encode([...$existing, ...$pendingRequest->query()->all()])));
    }

    /**
     * Retry only a request that changes nothing, and only for a fault on FortiNAC's side or the way there.
     */
    public function handleRetry(FatalRequestException|RequestException $exception, Request $request): bool
    {
        $isSafe = $request instanceof FortiNacRequest ? $request->isSafe() : $request->getMethod() === Method::GET;

        if (! $isSafe) {
            return false;
        }

        return $exception instanceof FatalRequestException
            || in_array($exception->getResponse()->status(), [408, 429], true)
            || $exception->getResponse()->serverError();
    }

    /**
     * Page through a list request, $perPage records at a time (fortinac.pagination.per_page by default).
     */
    public function paginate(Request $request, ?int $perPage = null): FortiNacPaginator
    {
        return new FortiNacPaginator($this, $request, $perPage ?? (int) config('fortinac.pagination.per_page', 100));
    }

    /**
     * A query over an endpoint the package has no resource for, as FortiNac::from('/new-thing'); its records are
     * arrays.
     *
     * @return Builder<Data>
     */
    public function from(string $path): Builder
    {
        return new AdhocResource($this, $path);
    }

    /**
     * @param  array<string, mixed>  $query
     */
    public function get(string $path, array $query = []): Response
    {
        return $this->send(new AdhocRequest(Method::GET, $path, $query));
    }

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $query
     */
    public function post(string $path, array|JsonSerializable $body = [], array $query = []): Response
    {
        return $this->send(new AdhocBodyRequest(Method::POST, $path, $body, $query));
    }

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $query
     */
    public function put(string $path, array|JsonSerializable $body = [], array $query = []): Response
    {
        return $this->send(new AdhocBodyRequest(Method::PUT, $path, $body, $query));
    }

    /**
     * @param  array<string, mixed>  $query
     */
    public function delete(string $path, array $query = []): Response
    {
        return $this->send(new AdhocRequest(Method::DELETE, $path, $query));
    }
}
