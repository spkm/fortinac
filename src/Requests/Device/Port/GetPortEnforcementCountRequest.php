<?php

namespace spkm\FortiNac\Requests\Device\Port;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Lists the total number ports by enforcement status among those that match the supplied filters: GET /device/port/enforcement/count.
 */
class GetPortEnforcementCountRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/device/port/enforcement/count';
    }
}
