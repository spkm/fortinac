<?php

namespace spkm\FortiNac\Requests\Host\ScanResult;

use spkm\FortiNac\Data\Host\ScanResult;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Scan Result records which match the supplied filter: GET /host/scan.
 */
class GetScanResultsRequest extends ListRequest
{
    protected ?string $dto = ScanResult::class;

    public function resolveEndpoint(): string
    {
        return '/host/scan';
    }
}
