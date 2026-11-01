<?php

namespace spkm\FortiNac\Requests\System\LocalProperties;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the current version and system information for this server: GET /system/local-properties/software-details.
 */
class GetLocalPropertiesSoftwareDetailsRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/local-properties/software-details';
    }
}
