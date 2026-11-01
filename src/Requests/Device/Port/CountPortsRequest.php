<?php

namespace spkm\FortiNac\Requests\Device\Port;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns the count of Port records matching the supplied filter: GET /device/port/count.
 */
class CountPortsRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/device/port/count';
    }
}
