<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Disables the supplied Supplicant Policy: POST /policy/supplicant/disable.
 *
 * Parameters: id.
 */
class DisableManySupplicantPoliciesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/supplicant/disable';
    }
}
