<?php

namespace spkm\FortiNac\Requests\Adapter\Adapter;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records that reference this Adapter record: GET /adapter/{id}/usage.
 */
class GetAdapterUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/adapter/'.$this->id.'/usage';
    }
}
