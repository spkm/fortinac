<?php

namespace spkm\FortiNac\Requests\Device\NetworkDevice;

use spkm\FortiNac\Data\Device\NetworkDevicePingableById;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds a new pingable device to the database: POST /device/pingable.
 */
class PostNetworkDevicePingableRequest extends WriteRequest
{
    protected ?string $dto = NetworkDevicePingableById::class;

    public function resolveEndpoint(): string
    {
        return '/device/pingable';
    }
}
