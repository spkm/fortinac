<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantConfiguration;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the information necessary to create a Supplicant Configuration: GET /policy/supplicant-configuration/supporting-info.
 */
class GetSupplicantConfigurationSupportingInfoRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/supplicant-configuration/supporting-info';
    }
}
