<?php

namespace spkm\FortiNac\Requests\Device\L3Scan;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Stops an L3 scan if it is currently running: POST /device/l3scan/stop.
 */
class StopL3ScanRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/device/l3scan/stop';
    }
}
