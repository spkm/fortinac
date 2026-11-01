<?php

namespace spkm\FortiNac\Requests\Host\Fingerprint;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Delete a single Fingerprint record by ID: POST /host/fingerprint/{id}/delete.
 */
class DeleteFingerprintViaPostRequest extends ActionRequest
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
        return '/host/fingerprint/'.$this->id.'/delete';
    }
}
