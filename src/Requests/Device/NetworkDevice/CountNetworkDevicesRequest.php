<?php

namespace spkm\FortiNac\Requests\Device\NetworkDevice;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns the Network Device record matching the supplied filter: GET /device/count.
 */
class CountNetworkDevicesRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/device/count';
    }
}
