<?php

namespace spkm\FortiNac\Requests\Host\RegistrationRequest;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Host Registration Request record by ID: POST /host/registration-request/{id}/delete.
 */
class DeleteRegistrationRequestViaPostRequest extends ActionRequest
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
        return '/host/registration-request/'.$this->id.'/delete';
    }
}
