<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentity;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Gets a count of Device Identity records that match the provided filter: GET /host/device-identity/count.
 */
class CountDeviceIdentitiesRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/device-identity/count';
    }
}
