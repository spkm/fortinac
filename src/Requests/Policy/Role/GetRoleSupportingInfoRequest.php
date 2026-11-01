<?php

namespace spkm\FortiNac\Requests\Policy\Role;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Retrieves information necessary to create or modify a role, such as Host and User groups: GET /policy/role/supporting-info.
 */
class GetRoleSupportingInfoRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/role/supporting-info';
    }
}
