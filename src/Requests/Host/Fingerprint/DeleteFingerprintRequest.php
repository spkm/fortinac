<?php

namespace spkm\FortiNac\Requests\Host\Fingerprint;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Fingerprint record by ID: DELETE /host/fingerprint/{id}.
 */
class DeleteFingerprintRequest extends DeleteRequest
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
        return '/host/fingerprint/'.$this->id;
    }
}
