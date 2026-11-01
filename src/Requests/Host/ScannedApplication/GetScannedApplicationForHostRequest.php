<?php

namespace spkm\FortiNac\Requests\Host\ScannedApplication;

use spkm\FortiNac\Data\Host\ScannedApplication;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Scanned Application that exist on the supplied filter: GET /host/scanned-application/for-host.
 */
class GetScannedApplicationForHostRequest extends ListRequest
{
    protected ?string $dto = ScannedApplication::class;

    public function resolveEndpoint(): string
    {
        return '/host/scanned-application/for-host';
    }
}
