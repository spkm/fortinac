<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables a list of Authentication Policy supplied under the id parameter: POST /policy/authentication/enable.
 *
 * Parameters: id.
 */
class EnableManyAuthenticationPoliciesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/authentication/enable';
    }
}
