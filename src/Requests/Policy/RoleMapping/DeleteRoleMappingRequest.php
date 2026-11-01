<?php

namespace spkm\FortiNac\Requests\Policy\RoleMapping;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single role mapping record by ID: DELETE /policy/role-mapping/{id}.
 */
class DeleteRoleMappingRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/policy/role-mapping/'.$this->id;
    }
}
