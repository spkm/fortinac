<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationConfiguration;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Authentication Configuration records by ID: POST /policy/authentication-configuration/{id}/delete.
 *
 * Parameters: id.
 */
class DeleteAuthenticationConfigurationViaPostRequest extends ActionRequest
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
        return '/policy/authentication-configuration/'.$this->id.'/delete';
    }
}
