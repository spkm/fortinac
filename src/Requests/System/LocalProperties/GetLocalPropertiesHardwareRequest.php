<?php

namespace spkm\FortiNac\Requests\System\LocalProperties;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Queries hardware status and performance information: GET /system/local-properties/hardware.
 */
class GetLocalPropertiesHardwareRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/local-properties/hardware';
    }
}
