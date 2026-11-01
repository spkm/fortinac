<?php

namespace spkm\FortiNac\Requests\Host\DeviceProfilingRule;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes the Device Profiling Rule record supplied, if it is not currently in use: DELETE /host/device-profiling-rule/{id}.
 */
class DeleteDeviceProfilingRuleRequest extends DeleteRequest
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
        return '/host/device-profiling-rule/'.$this->id;
    }
}
