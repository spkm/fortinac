<?php

namespace spkm\FortiNac\Requests\Host\DeviceProfilingRule;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Queues all unprofiled rogues to be scanned for matching Device Profiling Rules: POST /host/device-profiling-rule/scan.
 */
class ScanDeviceProfilingRuleRequest extends ActionRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/host/device-profiling-rule/scan';
    }
}
