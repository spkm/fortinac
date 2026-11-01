<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records that reference this Host Record: GET /host/{id}/usage.
 */
class GetHostUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/host/'.$this->id.'/usage';
    }
}
