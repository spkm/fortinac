<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the supplied Supplicant Policy: POST /policy/supplicant/enable.
 *
 * Parameters: id.
 */
class EnableManySupplicantPoliciesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/supplicant/enable';
    }
}
