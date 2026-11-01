<?php

namespace spkm\FortiNac\Requests\Policy\AccessPolicy;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Access Policy record by ID: DELETE /policy/access/{id}.
 */
class DeleteAccessPolicyRequest extends DeleteRequest
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
        return '/policy/access/'.$this->id;
    }
}
