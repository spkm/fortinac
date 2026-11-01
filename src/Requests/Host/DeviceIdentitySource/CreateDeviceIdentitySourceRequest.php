<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentitySource;

use spkm\FortiNac\Data\Host\DeviceIdentitySource;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Device Identity Source record, updating instead if the supplied profile has a DBID of one that already exists: POST /host/device-identity-source.
 */
class CreateDeviceIdentitySourceRequest extends WriteRequest
{
    protected ?string $dto = DeviceIdentitySource::class;

    public function resolveEndpoint(): string
    {
        return '/host/device-identity-source';
    }
}
