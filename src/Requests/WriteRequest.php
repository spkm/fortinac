<?php

namespace spkm\FortiNac\Requests;

use JsonSerializable;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

/**
 * A POST or PUT carrying a record as JSON: an array of FortiNAC's field names, a model, or a list (the ids a bulk
 * operation takes). FortiNAC answers with the record as stored, or with nothing but the envelope.
 */
abstract class WriteRequest extends FortiNacRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    protected string $responseShape = self::ONE;

    protected bool $safe = false;

    /** @var array<mixed>|JsonSerializable */
    protected array|JsonSerializable $record;

    /** @var array<string, mixed> */
    protected array $options;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options the operation documents.
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->record instanceof JsonSerializable ? (array) $this->record->jsonSerialize() : $this->record;
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->options;
    }
}
