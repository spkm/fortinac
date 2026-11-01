<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns all topology properties required to configure a device and the current configuration: GET /policy/logical-network-configuration/element/properties.
 *
 * Parameters: deviceID, readFromDevice.
 */
class GetLogicalNetworkConfigurationElementPropertiesRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: deviceID, readFromDevice
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/policy/logical-network-configuration/element/properties';
    }
}
