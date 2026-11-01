<?php

namespace spkm\FortiNac\Requests\Device\NetworkDevice;

use spkm\FortiNac\Data\Device\NetworkDeviceProperties;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the currently configured network device settings: GET /device/properties.
 */
class GetNetworkDevicePropertiesRequest extends ItemRequest
{
    protected ?string $dto = NetworkDeviceProperties::class;

    public function resolveEndpoint(): string
    {
        return '/device/properties';
    }
}
