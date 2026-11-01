<?php

namespace spkm\FortiNac\Requests\Host\ScannedApplication;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Scanned Application records by ID: POST /host/scanned-application/{id}/delete.
 */
class DeleteScannedApplicationViaPostRequest extends ActionRequest
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
        return '/host/scanned-application/'.$this->id.'/delete';
    }
}
