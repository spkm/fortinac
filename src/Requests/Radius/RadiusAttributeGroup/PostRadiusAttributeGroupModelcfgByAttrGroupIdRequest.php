<?php

namespace spkm\FortiNac\Requests\Radius\RadiusAttributeGroup;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Assign the RADIUS attribute group ID to the specified device ID, or if specified it's logical network: POST /radius/attrgroups/modelcfg/{deviceId}/{attrGroupId}.
 *
 * Parameters: logicalNetwork.
 */
class PostRadiusAttributeGroupModelcfgByAttrGroupIdRequest extends ActionRequest
{
    protected string $responseShape = self::SCALAR;

    /**
     * @param  array<string, mixed>  $options  Query options: logicalNetwork
     */
    public function __construct(protected int $deviceId, protected int $attrGroupId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/radius/attrgroups/modelcfg/'.$this->deviceId.'/'.$this->attrGroupId;
    }
}
