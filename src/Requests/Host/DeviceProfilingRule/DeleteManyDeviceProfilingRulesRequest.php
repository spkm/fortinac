<?php

namespace spkm\FortiNac\Requests\Host\DeviceProfilingRule;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the Device Profiling Rule record or records supplied, if they are not currently in use: POST /host/device-profiling-rule/delete.
 *
 * Parameters: id.
 */
class DeleteManyDeviceProfilingRulesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/device-profiling-rule/delete';
    }
}
