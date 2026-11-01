<?php

namespace spkm\FortiNac\Requests\Policy\Role;

use spkm\FortiNac\Data\Policy\Role;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of role records matching the supplied filter: GET /policy/role/{id}.
 */
class GetRoleRequest extends ItemRequest
{
    protected ?string $dto = Role::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/role/'.$this->id;
    }
}
