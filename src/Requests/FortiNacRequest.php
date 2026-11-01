<?php

namespace spkm\FortiNac\Requests;

use Illuminate\Support\Facades\Cache;
use JsonException;
use Saloon\CachePlugin\Contracts\Cacheable;
use Saloon\CachePlugin\Contracts\Driver;
use Saloon\CachePlugin\Drivers\LaravelCacheDriver;
use Saloon\CachePlugin\Traits\HasCaching;
use Saloon\Enums\Method;
use Saloon\Http\PendingRequest;
use Saloon\Http\Request;
use Saloon\Http\Response;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Exceptions\ServerErrorException;
use spkm\FortiNac\FortiNacApiException;
use spkm\FortiNac\Support\Payload;

/**
 * What every request to FortiNAC shares: the shape of the response and the model it maps to (for dto()), and
 * optional response caching.
 */
abstract class FortiNacRequest extends Request implements Cacheable
{
    use HasCaching;

    public const ONE = 'one';

    public const LIST = 'list';

    public const SCALAR = 'scalar';

    public const RAW = 'raw';

    public const NONE = 'none';

    protected string $responseShape = self::NONE;

    /** @var class-string<Data>|null */
    protected ?string $dto = null;

    protected bool $cacheable = false;

    protected bool $safe = true;

    public function resolveCacheDriver(): Driver
    {
        return new LaravelCacheDriver(Cache::store(config('fortinac.cache.store')));
    }

    public function cacheExpiryInSeconds(): int
    {
        return (int) config('fortinac.cache.seconds', 3600);
    }

    /**
     * @return array<Method>
     */
    protected function getCacheableMethods(): array
    {
        return $this->cacheable && config('fortinac.cache.enabled') ? [Method::GET] : [];
    }

    protected function cacheKey(PendingRequest $pendingRequest): string
    {
        return 'fortinac.response.'.sha1($pendingRequest->getMethod()->value.' '.$pendingRequest->getUri());
    }

    /**
     * Whether the request can be retried: a GET that changes nothing.
     */
    public function isSafe(): bool
    {
        return $this->safe && $this->getMethod() === Method::GET;
    }

    /**
     * @return class-string<Data>|null
     */
    public function dtoClass(): ?string
    {
        return $this->dto;
    }

    public function responseShape(): string
    {
        return $this->responseShape;
    }

    /**
     * The response as the request's model (or models, or arrays for a request without one; or the one number a
     * count gives), null for an answer without a body, or a FortiNacApiException for an error status or an
     * envelope whose status is not "success".
     */
    public function createDtoFromResponse(Response $response): mixed
    {
        if (! $response->successful()) {
            throw FortiNacApiException::fromResponse($response);
        }

        if (trim($response->body()) === '') {
            return null;
        }

        try {
            if (! Payload::succeeded($response)) {
                throw FortiNacApiException::fromResponse($response);
            }

            return match ($this->responseShape) {
                self::ONE => Payload::object($response, $this->dto),
                self::LIST => Payload::items($response, $this->dto),
                self::SCALAR => Payload::scalar($response),
                self::RAW => Payload::json($response),
                default => null,
            };
        } catch (JsonException) {
            // A successful status with something other than JSON, such as a proxy's or maintenance page.
            throw new ServerErrorException($response);
        }
    }
}
