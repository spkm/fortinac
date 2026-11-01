<?php

namespace spkm\FortiNac\Requests\Host\DeviceProfilingRule;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Disables the Device Profiling Rule that matches the supplied DBID: POST /host/device-profiling-rule/{id}/disable.
 */
class DisableDeviceProfilingRuleRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/host/device-profiling-rule/'.$this->id.'/disable';
    }
}
