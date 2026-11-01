<?php

namespace spkm\FortiNac\Requests\Adapter\Adapter;

use JsonSerializable;
use spkm\FortiNac\Data\Adapter\Adapter;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an existing Adapter record in the database. Parameter Id(required), DBID of the adapter record: POST /adapter/{id}.
 */
class UpdateAdapterRequest extends WriteRequest
{
    protected ?string $dto = Adapter::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/adapter/'.$this->id;
    }
}
