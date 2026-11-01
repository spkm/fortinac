<?php

namespace spkm\FortiNac\Requests\Host\Fingerprint;

use spkm\FortiNac\Data\Host\Fingerprint;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Fingerprint record, updating instead if the supplied profile has a DBID of one that already exists: POST /host/fingerprint.
 */
class CreateFingerprintRequest extends WriteRequest
{
    protected ?string $dto = Fingerprint::class;

    public function resolveEndpoint(): string
    {
        return '/host/fingerprint';
    }
}
