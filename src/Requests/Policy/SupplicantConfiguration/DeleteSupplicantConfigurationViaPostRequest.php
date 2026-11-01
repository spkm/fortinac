<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantConfiguration;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Supplicant Configuration record by ID: POST /policy/supplicant-configuration/{id}/delete.
 *
 * Parameters: id.
 */
class DeleteSupplicantConfigurationViaPostRequest extends ActionRequest
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
        return '/policy/supplicant-configuration/'.$this->id.'/delete';
    }
}
