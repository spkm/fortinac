<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Authentication Policy records supplied under the id parameter: POST /policy/authentication/delete.
 *
 * Parameters: id.
 */
class DeleteManyAuthenticationPoliciesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/authentication/delete';
    }
}
