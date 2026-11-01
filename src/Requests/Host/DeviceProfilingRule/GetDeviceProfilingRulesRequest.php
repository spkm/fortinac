<?php

namespace spkm\FortiNac\Requests\Host\DeviceProfilingRule;

use spkm\FortiNac\Data\Host\DeviceProfilingRule;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Device Profiling Rule records which match the supplied filter: GET /host/device-profiling-rule.
 */
class GetDeviceProfilingRulesRequest extends ListRequest
{
    protected ?string $dto = DeviceProfilingRule::class;

    public function resolveEndpoint(): string
    {
        return '/host/device-profiling-rule';
    }
}
