<?php

namespace spkm\FortiNac\Requests\Radius\RadiusAttributeGroup;

use spkm\FortiNac\Data\Radius\RadiusAttributeGroup;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Get all defined RADIUS attribute groups, or if provided those matching specified filter: GET /radius/attrgroups.
 */
class GetRadiusAttributeGroupsRequest extends ListRequest
{
    protected ?string $dto = RadiusAttributeGroup::class;

    public function resolveEndpoint(): string
    {
        return '/radius/attrgroups';
    }
}
