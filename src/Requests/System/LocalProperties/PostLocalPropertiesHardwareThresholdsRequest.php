<?php

namespace spkm\FortiNac\Requests\System\LocalProperties;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Set the hardware performance thresholds, providing warnings for high utilization: POST /system/local-properties/hardware/thresholds.
 *
 * Parameters: warningAttrName, warningAttrVal, criticalAttrName, criticalAttrVal.
 */
class PostLocalPropertiesHardwareThresholdsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/local-properties/hardware/thresholds';
    }
}
