<?php

namespace spkm\FortiNac\Requests\Host\DeviceProfilingRule;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Swaps the ranks of two Device Profiling Rules with provided database ids: POST /host/device-profiling-rule/swap-rule-ranks.
 *
 * Parameters: id, id2.
 */
class SwapDeviceProfilingRuleRuleRanksRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/device-profiling-rule/swap-rule-ranks';
    }
}
