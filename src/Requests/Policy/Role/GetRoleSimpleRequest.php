<?php

namespace spkm\FortiNac\Requests\Policy\Role;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the Name and ID of all Roles: GET /policy/role/simple.
 */
class GetRoleSimpleRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/role/simple';
    }
}
