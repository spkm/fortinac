<?php

namespace spkm\FortiNac\Requests\Radius\RadiusServer;

use spkm\FortiNac\Data\Radius\RadiusServer;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Return all RADIUS server configuration objects: GET /radius/radius-server-config.
 */
class GetRadiusServersRequest extends ListRequest
{
    protected ?string $dto = RadiusServer::class;

    public function resolveEndpoint(): string
    {
        return '/radius/radius-server-config';
    }
}
