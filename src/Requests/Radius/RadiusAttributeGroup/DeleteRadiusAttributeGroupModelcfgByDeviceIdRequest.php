<?php

namespace spkm\FortiNac\Requests\Radius\RadiusAttributeGroup;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Delete the RADIUS attribute group ID(if one exists) for the model configuration ID, or if specified it's logical network: DELETE /radius/attrgroups/modelcfg/{deviceId}.
 *
 * Parameters: logicalNetwork.
 */
class DeleteRadiusAttributeGroupModelcfgByDeviceIdRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: logicalNetwork
     */
    public function __construct(protected int $deviceId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/radius/attrgroups/modelcfg/'.$this->deviceId;
    }
}
