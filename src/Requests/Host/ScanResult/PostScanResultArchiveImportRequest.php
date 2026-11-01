<?php

namespace spkm\FortiNac\Requests\Host\ScanResult;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Imports the contents of a Scan Results archive into the database from the filesystem: POST /host/scan/archive/import.
 */
class PostScanResultArchiveImportRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/scan/archive/import';
    }
}
