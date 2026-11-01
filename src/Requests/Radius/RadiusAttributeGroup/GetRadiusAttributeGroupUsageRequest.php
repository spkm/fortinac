<?php

namespace spkm\FortiNac\Requests\Radius\RadiusAttributeGroup;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Get the usage data for the specified attribute group: GET /radius/attrgroups/{attrGroupId}/usage.
 */
class GetRadiusAttributeGroupUsageRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function __construct(protected int $attrGroupId) {}

    public function resolveEndpoint(): string
    {
        return '/radius/attrgroups/'.$this->attrGroupId.'/usage';
    }
}
