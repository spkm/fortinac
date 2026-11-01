<?php

namespace spkm\FortiNac\Requests\Host\ScanResult;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Creates a new archive of all scans or set of scans by ID: POST /host/scan/archive/create.
 *
 * Parameters: id.
 */
class PostScanResultArchiveCreateRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/scan/archive/create';
    }
}
