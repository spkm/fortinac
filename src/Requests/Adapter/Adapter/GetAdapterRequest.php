<?php

namespace spkm\FortiNac\Requests\Adapter\Adapter;

use spkm\FortiNac\Data\Adapter\Adapter;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the adapter record with the supplied DBID. Request Parameter Id(required), DBID of the adapter record: GET /adapter/{id}.
 */
class GetAdapterRequest extends ItemRequest
{
    protected ?string $dto = Adapter::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/adapter/'.$this->id;
    }
}
