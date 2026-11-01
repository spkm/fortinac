<?php

namespace spkm\FortiNac\Requests\Policy\AccessConfiguration;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Access Configuration record by ID: DELETE /policy/access-configuration/{id}.
 */
class DeleteAccessConfigurationRequest extends DeleteRequest
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
        return '/policy/access-configuration/'.$this->id;
    }
}
