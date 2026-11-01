<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentity;

use spkm\FortiNac\Data\Host\DeviceIdentity;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds a new Device Identity record to the database: POST /host/device-identity.
 */
class CreateDeviceIdentityRequest extends WriteRequest
{
    protected ?string $dto = DeviceIdentity::class;

    public function resolveEndpoint(): string
    {
        return '/host/device-identity';
    }
}
