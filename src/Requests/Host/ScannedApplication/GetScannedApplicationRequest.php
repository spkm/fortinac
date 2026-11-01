<?php

namespace spkm\FortiNac\Requests\Host\ScannedApplication;

use spkm\FortiNac\Data\Host\ScannedApplication;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Return a list of Scanned Application record matching the supplied filter: GET /host/scanned-application/{id}.
 */
class GetScannedApplicationRequest extends ItemRequest
{
    protected ?string $dto = ScannedApplication::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/host/scanned-application/'.$this->id;
    }
}
