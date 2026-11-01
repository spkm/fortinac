<?php

namespace spkm\FortiNac\Requests\System\LocalProperties;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the current license information for this server: GET /system/local-properties/license.
 */
class GetLocalPropertiesLicenseRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/local-properties/license';
    }
}
