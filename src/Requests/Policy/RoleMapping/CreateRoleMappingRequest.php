<?php

namespace spkm\FortiNac\Requests\Policy\RoleMapping;

use spkm\FortiNac\Data\Policy\RoleMapping;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new role mapping record, updating instead if the supplied profile has a DBID of one that already exists: POST /policy/role-mapping.
 */
class CreateRoleMappingRequest extends WriteRequest
{
    protected ?string $dto = RoleMapping::class;

    public function resolveEndpoint(): string
    {
        return '/policy/role-mapping';
    }
}
