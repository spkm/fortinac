<?php

namespace spkm\FortiNac\Requests\Policy\Role;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single role record by ID: DELETE /policy/role/{id}.
 */
class DeleteRoleRequest extends DeleteRequest
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
        return '/policy/role/'.$this->id;
    }
}
