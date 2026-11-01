<?php

namespace spkm\FortiNac\Requests\Settings\DeviceType;

use spkm\FortiNac\Data\Settings\DeviceType;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Device Type records matching the supplied filter: GET /settings/device/device-type.
 */
class GetDeviceTypesRequest extends ListRequest
{
    protected ?string $dto = DeviceType::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/device-type';
    }
}
