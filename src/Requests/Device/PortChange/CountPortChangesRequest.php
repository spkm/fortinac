<?php

namespace spkm\FortiNac\Requests\Device\PortChange;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns a count of Port Change records matching the supplied filter: GET /device/port-changes/count.
 */
class CountPortChangesRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/device/port-changes/count';
    }
}
