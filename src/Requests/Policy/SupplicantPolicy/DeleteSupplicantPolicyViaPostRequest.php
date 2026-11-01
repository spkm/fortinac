<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Supplicant Policy record by ID: POST /policy/supplicant/{id}/delete.
 */
class DeleteSupplicantPolicyViaPostRequest extends ActionRequest
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
        return '/policy/supplicant/'.$this->id.'/delete';
    }
}
