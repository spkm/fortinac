<?php

namespace spkm\FortiNac\Requests\Policy\Role;

use spkm\FortiNac\Data\Policy\Role;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of role records matching the supplied filter: GET /policy/role.
 */
class GetRolesRequest extends ListRequest
{
    protected ?string $dto = Role::class;

    public function resolveEndpoint(): string
    {
        return '/policy/role';
    }
}
