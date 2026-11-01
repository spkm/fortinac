<?php

namespace spkm\FortiNac\Requests\Host\DeviceProfilingRule;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the Device Profiling Rule record or records supplied, if they are not currently in use: POST /host/device-profiling-rule/{id}/delete.
 */
class DeleteDeviceProfilingRuleViaPostRequest extends ActionRequest
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
        return '/host/device-profiling-rule/'.$this->id.'/delete';
    }
}
