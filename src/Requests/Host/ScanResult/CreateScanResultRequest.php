<?php

namespace spkm\FortiNac\Requests\Host\ScanResult;

use spkm\FortiNac\Data\Host\ScanResult;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Triggers a scan of Host Record for the ids provided: POST /host/scan.
 *
 * Parameters: id.
 */
class CreateScanResultRequest extends ActionRequest
{
    protected ?string $dto = ScanResult::class;

    public function resolveEndpoint(): string
    {
        return '/host/scan';
    }
}
