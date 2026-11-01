<?php

namespace spkm\FortiNac\Requests\Host\ScanResult;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Return the list of archived scan result available on the file system: GET /host/scan/archives.
 */
class GetScanResultArchivesRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/host/scan/archives';
    }
}
