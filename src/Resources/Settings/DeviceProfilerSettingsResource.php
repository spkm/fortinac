<?php

namespace spkm\FortiNac\Resources\Settings;

use spkm\FortiNac\Data\Settings\DeviceProfilerSettings;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Settings\DeviceProfilerSettings\GetDeviceProfilerSettingsRequest;
use spkm\FortiNac\Requests\Settings\DeviceProfilerSettings\UpdateDeviceProfilerSettingsRequest;
use spkm\FortiNac\Resources\SingletonResource;

/**
 * Device Profiler, from FortiNac::settings()->deviceProfiler().
 *
 * @extends SingletonResource<DeviceProfilerSettings>
 */
class DeviceProfilerSettingsResource extends SingletonResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, DeviceProfilerSettings::class);
    }

    protected function getRequest(array $options): FortiNacRequest
    {
        return new GetDeviceProfilerSettingsRequest;
    }

    protected function updateRequest(array $body, array $options): FortiNacRequest
    {
        return new UpdateDeviceProfilerSettingsRequest([...$body, ...$options]);
    }
}
