<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets attributes for a number of devices in one request: POST /policy/logical-network-configuration/element/properties.
 */
class PostLogicalNetworkConfigurationElementPropertiesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/logical-network-configuration/element/properties';
    }
}
