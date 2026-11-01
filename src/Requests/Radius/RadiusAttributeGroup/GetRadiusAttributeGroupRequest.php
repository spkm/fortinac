<?php

namespace spkm\FortiNac\Requests\Radius\RadiusAttributeGroup;

use spkm\FortiNac\Data\Radius\RadiusAttributeGroup;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Get RADIUS attribute group with specified ID: GET /radius/attrgroups/{attrGroupId}.
 */
class GetRadiusAttributeGroupRequest extends ItemRequest
{
    protected ?string $dto = RadiusAttributeGroup::class;

    public function __construct(protected int $attrGroupId) {}

    public function resolveEndpoint(): string
    {
        return '/radius/attrgroups/'.$this->attrGroupId;
    }
}
