<?php

namespace spkm\FortiNac\Requests\Settings\DeviceType;

use spkm\FortiNac\Data\Settings\DeviceTypeImageArchive;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the images currently uploaded to the system: GET /settings/device/device-type/image/archive.
 */
class GetDeviceTypeImageArchiveRequest extends ItemRequest
{
    protected ?string $dto = DeviceTypeImageArchive::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/device-type/image/archive';
    }
}
