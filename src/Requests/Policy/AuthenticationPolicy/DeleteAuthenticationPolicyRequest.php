<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationPolicy;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Authentication Policy record by ID: DELETE /policy/authentication/{id}.
 */
class DeleteAuthenticationPolicyRequest extends DeleteRequest
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
        return '/policy/authentication/'.$this->id;
    }
}
