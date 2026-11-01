<?php

namespace spkm\FortiNac\Requests\Radius\RadiusServer;

use spkm\FortiNac\Data\Radius\RadiusServerGlobal;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Retrieves the global configuration settings for the local RADIUS service: GET /radius/radius-server-config/global.
 */
class GetRadiusServerGlobalRequest extends ItemRequest
{
    protected ?string $dto = RadiusServerGlobal::class;

    public function resolveEndpoint(): string
    {
        return '/radius/radius-server-config/global';
    }
}
