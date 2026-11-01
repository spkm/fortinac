<?php

namespace spkm\FortiNac\Requests\Radius\RadiusServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the RadiusServer service for the system: POST /radius/radius-server-config/enable.
 */
class EnableManyRadiusServersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/radius/radius-server-config/enable';
    }
}
