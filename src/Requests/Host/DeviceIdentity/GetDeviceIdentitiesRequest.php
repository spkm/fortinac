<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentity;

use spkm\FortiNac\Data\Host\DeviceIdentity;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Device Identity record which match the supplied filter: GET /host/device-identity.
 */
class GetDeviceIdentitiesRequest extends ListRequest
{
    protected ?string $dto = DeviceIdentity::class;

    public function resolveEndpoint(): string
    {
        return '/host/device-identity';
    }
}
