<?php

namespace spkm\FortiNac\Requests\System\LocalProperties;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * GET /system/local-properties/config-status: GET /system/local-properties/config-status.
 */
class GetLocalPropertiesConfigStatusRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/local-properties/config-status';
    }
}
