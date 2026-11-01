<?php

namespace spkm\FortiNac\Requests\Host\ScanResult;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all Scan Results in the database: GET /host/scan/count/all.
 */
class CountAllScanResultsRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/host/scan/count/all';
    }
}
