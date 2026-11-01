<?php

namespace spkm\FortiNac\Requests\Host\Fingerprint;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Delete a list of Fingerprint records supplied under the id parameter: POST /host/fingerprint/delete.
 *
 * Parameters: id.
 */
class DeleteManyFingerprintsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/fingerprint/delete';
    }
}
