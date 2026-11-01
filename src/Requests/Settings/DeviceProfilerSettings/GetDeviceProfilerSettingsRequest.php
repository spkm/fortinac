<?php

namespace spkm\FortiNac\Requests\Settings\DeviceProfilerSettings;

use spkm\FortiNac\Data\Settings\DeviceProfilerSettings;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the currently configured Device Profiler settings: GET /settings/device/device-profiler.
 */
class GetDeviceProfilerSettingsRequest extends ItemRequest
{
    protected ?string $dto = DeviceProfilerSettings::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/device-profiler';
    }
}
