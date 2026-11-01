<?php

namespace spkm\FortiNac\Requests\Policy\RoleMapping;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Delete a single role mapping record by ID: POST /policy/role-mapping/{id}/delete.
 *
 * Parameters: id.
 */
class DeleteRoleMappingViaPostRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/policy/role-mapping/'.$this->id.'/delete';
    }
}
