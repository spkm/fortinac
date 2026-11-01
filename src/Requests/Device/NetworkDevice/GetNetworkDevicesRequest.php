<?php

namespace spkm\FortiNac\Requests\Device\NetworkDevice;

use spkm\FortiNac\Data\Device\NetworkDevice;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Network Device records which match the supplied filter: GET /device.
 */
class GetNetworkDevicesRequest extends ListRequest
{
    protected ?string $dto = NetworkDevice::class;

    public function resolveEndpoint(): string
    {
        return '/device';
    }
}
