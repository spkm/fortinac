<?php

namespace spkm\FortiNac\Requests\System\AnalyticsProperties;

use spkm\FortiNac\Data\System\AnalyticsProperties;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the analytics properties: POST /system/analytics-properties.
 *
 * Parameters: analyticsActivationKey, analyticsServer.
 */
class UpdateAnalyticsPropertiesRequest extends ActionRequest
{
    protected ?string $dto = AnalyticsProperties::class;

    public function resolveEndpoint(): string
    {
        return '/system/analytics-properties';
    }
}
