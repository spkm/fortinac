<?php

namespace spkm\FortiNac\Requests\Host\ScanResult;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Gets a count of Scan Results that match the provided filter: GET /host/scan/count.
 */
class CountScanResultsRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/scan/count';
    }
}
