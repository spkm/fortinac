<?php

namespace spkm\FortiNac\Requests\Adapter\Adapter;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the port ID that the adapter was most recently connected to. Request Parameter Id(required), DBID of the adapter record: GET /adapter/{id}/get-port.
 */
class GetAdapterGetPortRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/adapter/'.$this->id.'/get-port';
    }
}
