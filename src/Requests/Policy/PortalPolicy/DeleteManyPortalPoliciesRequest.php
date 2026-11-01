<?php

namespace spkm\FortiNac\Requests\Policy\PortalPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of portal policy records supplied under the id parameter: POST /policy/portal/delete.
 *
 * Parameters: id.
 */
class DeleteManyPortalPoliciesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/portal/delete';
    }
}
