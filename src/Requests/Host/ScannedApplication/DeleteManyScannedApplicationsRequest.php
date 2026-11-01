<?php

namespace spkm\FortiNac\Requests\Host\ScannedApplication;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Scanned Application records with the supplied database ids: POST /host/scanned-application/delete.
 *
 * Parameters: id.
 */
class DeleteManyScannedApplicationsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/scanned-application/delete';
    }
}
