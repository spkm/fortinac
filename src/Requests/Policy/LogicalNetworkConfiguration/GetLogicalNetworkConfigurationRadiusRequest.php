<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of configured RADIUS servers and the current default primary and secondary: GET /policy/logical-network-configuration/radius.
 */
class GetLogicalNetworkConfigurationRadiusRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/policy/logical-network-configuration/radius';
    }
}
