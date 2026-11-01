<?php

namespace spkm\FortiNac\Requests\Host\DeviceProfilingRule;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the number of MAC addresses currently queued to be profiled: GET /host/device-profiling-rule/queue.
 */
class GetDeviceProfilingRuleQueueRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/host/device-profiling-rule/queue';
    }
}
