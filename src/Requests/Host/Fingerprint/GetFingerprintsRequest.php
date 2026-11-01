<?php

namespace spkm\FortiNac\Requests\Host\Fingerprint;

use spkm\FortiNac\Data\Host\Fingerprint;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Fingerprint records matching the supplied filter: GET /host/fingerprint.
 */
class GetFingerprintsRequest extends ListRequest
{
    protected ?string $dto = Fingerprint::class;

    public function resolveEndpoint(): string
    {
        return '/host/fingerprint';
    }
}
