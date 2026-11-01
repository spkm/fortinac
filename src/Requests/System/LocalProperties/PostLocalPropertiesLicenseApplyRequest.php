<?php

namespace spkm\FortiNac\Requests\System\LocalProperties;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Applies a new license key to this appliance: POST /system/local-properties/license/apply.
 *
 * Parameters: licenseKey.
 */
class PostLocalPropertiesLicenseApplyRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/local-properties/license/apply';
    }
}
