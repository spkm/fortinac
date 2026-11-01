<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration;

use JsonSerializable;
use spkm\FortiNac\Data\Policy\LogicalNetworkConfigurationElementPropertiesByDeviceId;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates the topology properties on a single device: POST /policy/logical-network-configuration/element/properties/{deviceID}.
 */
class PostLogicalNetworkConfigurationElementPropertiesByDeviceIdRequest extends WriteRequest
{
    protected ?string $dto = LogicalNetworkConfigurationElementPropertiesByDeviceId::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $deviceId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/policy/logical-network-configuration/element/properties/'.$this->deviceId;
    }
}
