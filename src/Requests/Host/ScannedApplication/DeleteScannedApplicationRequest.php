<?php

namespace spkm\FortiNac\Requests\Host\ScannedApplication;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Scanned Application record by ID: DELETE /host/scanned-application/{id}.
 */
class DeleteScannedApplicationRequest extends DeleteRequest
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
        return '/host/scanned-application/'.$this->id;
    }
}
