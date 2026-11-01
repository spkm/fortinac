<?php

namespace spkm\FortiNac\Requests\Settings\DeviceType;

use spkm\FortiNac\Data\Settings\DeviceType;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Device Type records matching the supplied filter: GET /settings/device/device-type/{id}.
 */
class GetDeviceTypeRequest extends ItemRequest
{
    protected ?string $dto = DeviceType::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/device/device-type/'.$this->id;
    }
}
