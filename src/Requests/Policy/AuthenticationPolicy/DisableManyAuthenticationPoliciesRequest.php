<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Disables the supplied Authentication Policy: POST /policy/authentication/disable.
 *
 * Parameters: id.
 */
class DisableManyAuthenticationPoliciesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/authentication/disable';
    }
}
