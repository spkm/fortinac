<?php

namespace spkm\FortiNac\Requests\Device\L3Scan;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the results for the last completed scan or the one currently in progress: GET /device/l3scan/status.
 */
class GetL3ScanStatusRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/device/l3scan/status';
    }
}
