<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantPolicy;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Supplicant Policy record by ID: DELETE /policy/supplicant/{id}.
 */
class DeleteSupplicantPolicyRequest extends DeleteRequest
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
        return '/policy/supplicant/'.$this->id;
    }
}
