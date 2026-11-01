<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentity;

use spkm\FortiNac\Data\Host\DeviceIdentity;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the Device Identity record which match the supplied DBID: GET /host/device-identity/{id}.
 */
class GetDeviceIdentityRequest extends ItemRequest
{
    protected ?string $dto = DeviceIdentity::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/host/device-identity/'.$this->id;
    }
}
