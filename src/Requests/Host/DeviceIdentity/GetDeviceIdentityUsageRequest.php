<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentity;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records that reference this Device Identity record: GET /host/device-identity/{id}/usage.
 */
class GetDeviceIdentityUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/host/device-identity/'.$this->id.'/usage';
    }
}
