<?php

namespace spkm\FortiNac\Requests\Host\RegistrationRequest;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Host Registration Request record by ID: DELETE /host/registration-request/{id}.
 */
class DeleteRegistrationRequestRequest extends DeleteRequest
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
        return '/host/registration-request/'.$this->id;
    }
}
