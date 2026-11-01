<?php

namespace spkm\FortiNac\Requests\Policy\RoleMapping;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Retrieves information necessary to create or modify a role mapping, such as Roles, Port and Device Groups, and CLI configurations: GET /policy/role-mapping/supporting-info.
 */
class GetRoleMappingSupportingInfoRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/role-mapping/supporting-info';
    }
}
