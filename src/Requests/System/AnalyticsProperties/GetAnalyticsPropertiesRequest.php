<?php

namespace spkm\FortiNac\Requests\System\AnalyticsProperties;

use spkm\FortiNac\Data\System\AnalyticsProperties;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the current activation key and server configurations: GET /system/analytics-properties.
 */
class GetAnalyticsPropertiesRequest extends ItemRequest
{
    protected ?string $dto = AnalyticsProperties::class;

    public function resolveEndpoint(): string
    {
        return '/system/analytics-properties';
    }
}
