<?php

namespace spkm\FortiNac\Requests\Radius\RadiusServer;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the current status for the RADIUS service: GET /radius/radius-server-config/status.
 */
class GetRadiusServerStatusRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/radius/radius-server-config/status';
    }
}
