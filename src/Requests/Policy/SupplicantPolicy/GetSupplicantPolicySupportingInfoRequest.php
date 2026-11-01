<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantPolicy;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the information used to create a Supplicant Policy: GET /policy/supplicant/supporting-info.
 */
class GetSupplicantPolicySupportingInfoRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/supplicant/supporting-info';
    }
}
