<?php

namespace spkm\FortiNac\Requests;

use Saloon\Enums\Method;

/**
 * A GET for one record: by its id, by another key such as its MAC address, or the one record a setting has.
 */
abstract class ItemRequest extends FortiNacRequest
{
    protected Method $method = Method::GET;

    protected string $responseShape = self::ONE;

    protected bool $cacheable = true;

    /** @var array<string, mixed> */
    protected array $options = [];

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->options;
    }
}
