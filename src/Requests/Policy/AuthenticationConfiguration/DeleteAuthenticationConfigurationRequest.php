<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationConfiguration;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Authentication Configuration record by ID: DELETE /policy/authentication-configuration/{id}.
 */
class DeleteAuthenticationConfigurationRequest extends DeleteRequest
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
        return '/policy/authentication-configuration/'.$this->id;
    }
}
