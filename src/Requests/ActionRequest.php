<?php

namespace spkm\FortiNac\Requests;

use Saloon\Enums\Method;

/**
 * A POST that does something to a record without sending one: enable, disable, run, start, stop and the like.
 * FortiNAC answers with the record afterwards, or with nothing but the envelope.
 */
abstract class ActionRequest extends FortiNacRequest
{
    protected Method $method = Method::POST;

    protected string $responseShape = self::ONE;

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
