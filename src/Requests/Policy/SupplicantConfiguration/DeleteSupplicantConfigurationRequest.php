<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantConfiguration;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Supplicant Configuration record by ID: DELETE /policy/supplicant-configuration/{id}.
 */
class DeleteSupplicantConfigurationRequest extends DeleteRequest
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
        return '/policy/supplicant-configuration/'.$this->id;
    }
}
