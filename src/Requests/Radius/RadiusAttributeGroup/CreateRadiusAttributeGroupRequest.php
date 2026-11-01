<?php

namespace spkm\FortiNac\Requests\Radius\RadiusAttributeGroup;

use spkm\FortiNac\Data\Radius\RadiusAttributeGroup;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Create new RADIUS attribute group: POST /radius/attrgroups.
 */
class CreateRadiusAttributeGroupRequest extends WriteRequest
{
    protected ?string $dto = RadiusAttributeGroup::class;

    public function resolveEndpoint(): string
    {
        return '/radius/attrgroups';
    }
}
