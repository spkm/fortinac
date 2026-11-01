<?php

namespace spkm\FortiNac\Requests\Radius\RadiusServer;

use spkm\FortiNac\Data\Radius\RadiusServerGlobalResult;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Set the global Local Radius config that applies to all LocalRadiusConfiguration instances, such as auth port: POST /radius/radius-server-config/global.
 */
class PostRadiusServerGlobalRequest extends WriteRequest
{
    protected ?string $dto = RadiusServerGlobalResult::class;

    public function resolveEndpoint(): string
    {
        return '/radius/radius-server-config/global';
    }
}
