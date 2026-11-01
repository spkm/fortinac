<?php

namespace spkm\FortiNac\Requests\Policy\RoleMapping;

use spkm\FortiNac\Data\Policy\RoleMapping;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Return a list of role mapping records matching the supplied filter: GET /policy/role-mapping.
 */
class GetRoleMappingsRequest extends ListRequest
{
    protected ?string $dto = RoleMapping::class;

    public function resolveEndpoint(): string
    {
        return '/policy/role-mapping';
    }
}
