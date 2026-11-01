<?php

namespace spkm\FortiNac\Requests\Radius\RadiusServer;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the list of EAP types that are supported by the Local RADIUS server: GET /radius/radius-server-config/eap-types.
 */
class GetRadiusServerEapTypesRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/radius/radius-server-config/eap-types';
    }
}
