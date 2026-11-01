<?php

namespace spkm\FortiNac\Requests\Settings\DeviceProfilerSettings;

use spkm\FortiNac\Data\Settings\DeviceProfilerSettings;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Adds a new device profiler configuration: POST /settings/device/device-profiler.
 *
 * Parameters: createRogues, disablePing, collectEnabled, collectUrl, queryUrl, isUsg, passivelotEnabled, passiveNmapEnabled.
 */
class UpdateDeviceProfilerSettingsRequest extends ActionRequest
{
    protected ?string $dto = DeviceProfilerSettings::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/device-profiler';
    }
}
