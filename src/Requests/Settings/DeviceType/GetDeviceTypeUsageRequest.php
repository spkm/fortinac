<?php

namespace spkm\FortiNac\Requests\Settings\DeviceType;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records that reference this Device Type record: GET /settings/device/device-type/{id}/usage.
 */
class GetDeviceTypeUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/device/device-type/'.$this->id.'/usage';
    }
}
