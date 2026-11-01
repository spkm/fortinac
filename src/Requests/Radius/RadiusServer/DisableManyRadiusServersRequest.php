<?php

namespace spkm\FortiNac\Requests\Radius\RadiusServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Disables the RadiusServer service for the system: POST /radius/radius-server-config/disable.
 */
class DisableManyRadiusServersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/radius/radius-server-config/disable';
    }
}
