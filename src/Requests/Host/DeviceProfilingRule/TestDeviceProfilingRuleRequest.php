<?php

namespace spkm\FortiNac\Requests\Host\DeviceProfilingRule;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Tests to see if the Device Profiling Rule with the supplied name would match the supplied adapter: POST /host/device-profiling-rule/test.
 *
 * Parameters: ruleName, macAddress.
 */
class TestDeviceProfilingRuleRequest extends ActionRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/host/device-profiling-rule/test';
    }
}
