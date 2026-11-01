<?php

namespace spkm\FortiNac\Requests\Device\NetworkDevice;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all Network Device records in the database: GET /device/count/all.
 */
class CountAllNetworkDevicesRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/device/count/all';
    }
}
