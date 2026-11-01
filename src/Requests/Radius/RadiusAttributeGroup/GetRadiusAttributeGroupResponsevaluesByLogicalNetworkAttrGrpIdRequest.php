<?php

namespace spkm\FortiNac\Requests\Radius\RadiusAttributeGroup;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Get the response values for the device attribute group ID and logical network attribute group ID: GET /radius/attrgroups/responsevalues/{deviceAttrGrpId}/{logicalNetworkAttrGrpId}.
 */
class GetRadiusAttributeGroupResponsevaluesByLogicalNetworkAttrGrpIdRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function __construct(protected int $deviceAttrGrpId, protected int $logicalNetworkAttrGrpId) {}

    public function resolveEndpoint(): string
    {
        return '/radius/attrgroups/responsevalues/'.$this->deviceAttrGrpId.'/'.$this->logicalNetworkAttrGrpId;
    }
}
