<?php

namespace spkm\FortiNac;

use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;
use spkm\FortiNac\Exceptions\FailedException;
use spkm\FortiNac\Exceptions\InvalidRequestException;
use spkm\FortiNac\Exceptions\NotFoundException;
use spkm\FortiNac\Exceptions\ServerErrorException;
use spkm\FortiNac\Exceptions\UnauthorizedException;
use spkm\FortiNac\Support\Payload;

/**
 * An error FortiNAC answered with. FortiNAC wraps every answer in {"status", "errorMessage", "results"}: an error
 * status, or a "status" other than "success" on a 200, says the request failed, and "errorMessage" says why.
 */
class FortiNacApiException extends RequestException
{
    public function __construct(Response $response)
    {
        parent::__construct($response, $this->describe($response));
    }

    /**
     * The exception for FortiNAC's answer: a subclass for the errors callers handle differently.
     */
    public static function fromResponse(Response $response): self
    {
        $status = $response->status();

        return match (true) {
            $response->successful() => new FailedException($response),
            $status === 404 => new NotFoundException($response),
            in_array($status, [401, 403], true) => new UnauthorizedException($response),
            in_array($status, [400, 405, 406, 415, 422], true) => new InvalidRequestException($response),
            $status === 408 || $response->serverError() => new ServerErrorException($response),
            default => new self($response),
        };
    }

    /**
     * FortiNAC's explanation of the failure, when it gave one.
     */
    public function errorMessage(): ?string
    {
        return self::text(Payload::errorMessage($this->getResponse()));
    }

    protected function describe(Response $response): string
    {
        $text = 'FortiNAC responded '.$response->status().' to '.self::requestLine($response);
        $page = self::htmlTitle($response);

        if ($page !== null) {
            return $text.' with an HTML '.($response->successful() ? 'page instead of JSON' : 'error page').($page !== '' ? " ('$page')" : '');
        }

        if ($response->body() !== '' && ! json_validate($response->body())) {
            return $response->successful() ? $text.' with a body that is not JSON' : $text.': '.self::clean($response->body());
        }

        $message = self::messageIn($response);

        return $text.($message !== null ? ": $message" : '');
    }

    /**
     * The failed request's method and path, without its query string.
     */
    protected static function requestLine(Response $response): string
    {
        $pendingRequest = $response->getPendingRequest();

        return $pendingRequest->getMethod()->value.' '.(parse_url($pendingRequest->getUrl(), PHP_URL_PATH) ?: '/');
    }

    /**
     * The title of an HTML error page ('' when it has none), or null when FortiNAC didn't send HTML.
     */
    private static function htmlTitle(Response $response): ?string
    {
        if (! str_contains(strtolower((string) $response->header('Content-Type')), 'html') && ! str_starts_with(ltrim($response->body()), '<')) {
            return null;
        }

        return preg_match('#<title>(.*?)</title>#is', $response->body(), $matches) ? self::clean(html_entity_decode($matches[1])) : '';
    }

    /**
     * What FortiNAC said: its errorMessage, or for an answer without the envelope whatever message or error the
     * body carries. Null when it said nothing the package can read.
     */
    private static function messageIn(Response $response): ?string
    {
        $body = json_decode($response->body(), true);

        if (! is_array($body) || array_is_list($body)) {
            return null;
        }

        foreach (['errorMessage', 'message', 'error', 'error_description', 'detail'] as $key) {
            $value = self::text($body[$key] ?? null);

            if ($value !== null) {
                return rtrim($value, '.');
            }
        }

        $status = self::text($body['status'] ?? null);

        return $status !== null && strtolower($status) !== 'success' ? 'status '.$status : null;
    }

    private static function text(mixed $value): ?string
    {
        return is_scalar($value) && trim((string) $value) !== '' ? self::clean((string) $value) : null;
    }

    /**
     * Server text fit for a message or a log line: tags and control characters out, one line, at most 200
     * characters.
     */
    private static function clean(string $value): string
    {
        $value = trim((string) preg_replace('/[\x00-\x1F\x7F]+/u', ' ', strip_tags($value)));

        return mb_strlen($value) > 200 ? mb_substr($value, 0, 197).'...' : $value;
    }
}
