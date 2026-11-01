<?php

namespace spkm\FortiNac\Requests\Policy\Role;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new role record, updating instead if the supplied profile has a DBID of one that already exists: POST /policy/role.
 */
class CreateRoleRequest extends WriteRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/policy/role';
    }
}
