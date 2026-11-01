<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentitySource;

use spkm\FortiNac\Data\Host\DeviceIdentitySource;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Device Identity Source records matching the supplied filter: GET /host/device-identity-source/{id}.
 */
class GetDeviceIdentitySourceRequest extends ItemRequest
{
    protected ?string $dto = DeviceIdentitySource::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/host/device-identity-source/'.$this->id;
    }
}
