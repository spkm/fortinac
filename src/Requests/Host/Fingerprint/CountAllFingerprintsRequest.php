<?php

namespace spkm\FortiNac\Requests\Host\Fingerprint;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all Fingerprint records in the database: GET /host/fingerprint/count/all.
 */
class CountAllFingerprintsRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/host/fingerprint/count/all';
    }
}
