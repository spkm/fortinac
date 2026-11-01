<?php

namespace spkm\FortiNac\Requests\Radius\RadiusServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Delete multiple RADIUS server configuration object by ID: POST /radius/radius-server-config/delete.
 *
 * Parameters: id.
 */
class DeleteManyRadiusServersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/radius/radius-server-config/delete';
    }
}
