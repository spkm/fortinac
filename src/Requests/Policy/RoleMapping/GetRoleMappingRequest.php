<?php

namespace spkm\FortiNac\Requests\Policy\RoleMapping;

use spkm\FortiNac\Data\Policy\RoleMapping;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Return a list of role mapping records matching the supplied filter: GET /policy/role-mapping/{id}.
 */
class GetRoleMappingRequest extends ItemRequest
{
    protected ?string $dto = RoleMapping::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/role-mapping/'.$this->id;
    }
}
