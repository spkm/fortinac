<?php

namespace spkm\FortiNac\Requests\Host\DeviceProfilingRule;

use spkm\FortiNac\Data\Host\DeviceProfilingRule;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds a new Device Profiling Rule record to the database: POST /host/device-profiling-rule.
 */
class CreateDeviceProfilingRuleRequest extends WriteRequest
{
    protected ?string $dto = DeviceProfilingRule::class;

    public function resolveEndpoint(): string
    {
        return '/host/device-profiling-rule';
    }
}
