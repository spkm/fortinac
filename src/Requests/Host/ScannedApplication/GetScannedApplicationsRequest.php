<?php

namespace spkm\FortiNac\Requests\Host\ScannedApplication;

use spkm\FortiNac\Data\Host\ScannedApplication;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Return a list of Scanned Application record matching the supplied filter: GET /host/scanned-application.
 */
class GetScannedApplicationsRequest extends ListRequest
{
    protected ?string $dto = ScannedApplication::class;

    public function resolveEndpoint(): string
    {
        return '/host/scanned-application';
    }
}
