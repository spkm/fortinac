<?php

namespace spkm\FortiNac\Requests\Policy\AccessPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Access Policy records supplied under the id parameter: POST /policy/access/delete.
 *
 * Parameters: id.
 */
class DeleteManyAccessPoliciesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/access/delete';
    }
}
