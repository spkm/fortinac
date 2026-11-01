<?php

namespace spkm\FortiNac\Requests\Policy\RoleMapping;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Delete a list of role mapping records supplied under the id parameter: POST /policy/role-mapping/delete.
 *
 * Parameters: id.
 */
class DeleteManyRoleMappingsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/role-mapping/delete';
    }
}
