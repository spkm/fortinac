<?php

namespace spkm\FortiNac\Requests\Radius\RadiusServer;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns true if RADIUS Activity Monitoring is enabled: GET /radius/radius-server-config/activityStatus.
 */
class GetRadiusServerActivityStatusRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/radius/radius-server-config/activityStatus';
    }
}
