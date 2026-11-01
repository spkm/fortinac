<?php

namespace spkm\FortiNac\Requests\Host\DeviceProfilingRule;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns the count of all Device Profiling Rule records in the database that match the provided filter: GET /host/device-profiling-rule/count.
 */
class CountDeviceProfilingRulesRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/device-profiling-rule/count';
    }
}
