<?php

namespace spkm\FortiNac\Requests\Device\Port;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all Port records in the database: GET /device/port/count/all.
 */
class CountAllPortsRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/device/port/count/all';
    }
}
