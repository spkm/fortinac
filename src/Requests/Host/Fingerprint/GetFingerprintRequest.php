<?php

namespace spkm\FortiNac\Requests\Host\Fingerprint;

use spkm\FortiNac\Data\Host\Fingerprint;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Fingerprint records matching the supplied filter: GET /host/fingerprint/{id}.
 */
class GetFingerprintRequest extends ItemRequest
{
    protected ?string $dto = Fingerprint::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/host/fingerprint/'.$this->id;
    }
}
