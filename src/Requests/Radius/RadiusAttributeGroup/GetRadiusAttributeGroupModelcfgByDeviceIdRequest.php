<?php

namespace spkm\FortiNac\Requests\Radius\RadiusAttributeGroup;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Get the RADIUS attribute group ID for the specified device ID, or if specified it's logical network: GET /radius/attrgroups/modelcfg/{deviceId}.
 *
 * Parameters: logicalNetwork.
 */
class GetRadiusAttributeGroupModelcfgByDeviceIdRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    /**
     * @param  array<string, mixed>  $options  Query options: logicalNetwork
     */
    public function __construct(protected int $deviceId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/radius/attrgroups/modelcfg/'.$this->deviceId;
    }
}
