<?php

namespace spkm\FortiNac\Requests\Host\DeviceProfilingRule;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all Device Profiling Rule records in the database: GET /host/device-profiling-rule/count/all.
 */
class CountAllDeviceProfilingRulesRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/host/device-profiling-rule/count/all';
    }
}
