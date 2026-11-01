<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentity;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all Device identity records in the database: GET /host/device-identity/count/all.
 */
class CountAllDeviceIdentitiesRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/host/device-identity/count/all';
    }
}
