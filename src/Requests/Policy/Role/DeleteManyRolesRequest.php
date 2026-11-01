<?php

namespace spkm\FortiNac\Requests\Policy\Role;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of role records supplied under the id parameter: POST /policy/role/delete.
 *
 * Parameters: id.
 */
class DeleteManyRolesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/role/delete';
    }
}
