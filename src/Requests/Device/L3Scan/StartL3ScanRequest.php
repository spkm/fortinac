<?php

namespace spkm\FortiNac\Requests\Device\L3Scan;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Starts an L3 scan of all the devices in order to identify potential L3 sources: POST /device/l3scan/start.
 */
class StartL3ScanRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/device/l3scan/start';
    }
}
