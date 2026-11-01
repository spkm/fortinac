<?php

namespace spkm\FortiNac\Requests\Host\DeviceProfilingRule;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Exports the configured Device Profiler rules as a download: GET /DeviceProfiler/Rule/export.
 */
class GetDeviceProfilingRuleRuleExportRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/DeviceProfiler/Rule/export';
    }
}
