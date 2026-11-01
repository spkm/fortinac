<?php

namespace spkm\FortiNac\Requests\Host\Fingerprint;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns the count of all Fingerprint records in the database that match the provided filter: GET /host/fingerprint/count.
 */
class CountFingerprintsRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/fingerprint/count';
    }
}
