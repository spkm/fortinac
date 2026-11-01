<?php

namespace spkm\FortiNac\Requests\Radius\RadiusServer;

use spkm\FortiNac\Data\Radius\RadiusServer;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a RADIUS server configuration object: POST /radius/radius-server-config.
 */
class CreateRadiusServerRequest extends WriteRequest
{
    protected ?string $dto = RadiusServer::class;

    public function resolveEndpoint(): string
    {
        return '/radius/radius-server-config';
    }
}
