<?php

namespace spkm\FortiNac\Requests\System\LocalProperties;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Queries hardware performance information only: GET /system/local-properties/hardware/performance.
 */
class GetLocalPropertiesHardwarePerformanceRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/local-properties/hardware/performance';
    }
}
