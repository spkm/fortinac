<?php

namespace spkm\FortiNac\Requests\Settings\DeviceType;

use spkm\FortiNac\Data\Settings\DeviceType;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Device Type record, updating instead if the supplied profile has a DBID of one that already exists: POST /settings/device/device-type.
 */
class CreateDeviceTypeRequest extends WriteRequest
{
    protected ?string $dto = DeviceType::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/device-type';
    }
}
