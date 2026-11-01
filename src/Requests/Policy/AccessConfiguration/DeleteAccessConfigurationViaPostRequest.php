<?php

namespace spkm\FortiNac\Requests\Policy\AccessConfiguration;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Access Configuration record by ID: POST /policy/access-configuration/{id}/delete.
 */
class DeleteAccessConfigurationViaPostRequest extends ActionRequest
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
        return '/policy/access-configuration/'.$this->id.'/delete';
    }
}
