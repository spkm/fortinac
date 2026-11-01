<?php

namespace spkm\FortiNac\Requests\Policy\Role;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single role record by ID: POST /policy/role/{id}/delete.
 */
class DeleteRoleViaPostRequest extends ActionRequest
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
        return '/policy/role/'.$this->id.'/delete';
    }
}
