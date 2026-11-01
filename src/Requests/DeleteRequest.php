<?php

namespace spkm\FortiNac\Requests;

use Saloon\Enums\Method;

/**
 * A DELETE of one record. FortiNAC answers with the envelope alone.
 */
abstract class DeleteRequest extends FortiNacRequest
{
    protected Method $method = Method::DELETE;

    protected string $responseShape = self::NONE;

    protected bool $safe = false;

    /** @var array<string, mixed> */
    protected array $options;

    /**
     * @param  array<string, mixed>  $options  Query options the operation documents.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->options;
    }
}
