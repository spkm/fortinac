<?php

namespace spkm\FortiNac\Requests\Host\ScanResult;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the percentage completed for the most recent import of a Scan Results archive: GET /host/scan/archive/import/status.
 */
class GetScanResultArchiveImportStatusRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/host/scan/archive/import/status';
    }
}
