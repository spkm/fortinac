<?php

namespace spkm\FortiNac\Requests\Device\PortChange;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of Port Change records in the database: GET /device/port-changes/count/all.
 */
class CountAllPortChangesRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/device/port-changes/count/all';
    }
}
