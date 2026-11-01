<?php

namespace spkm\FortiNac\Requests\Radius\RadiusAttributeGroup;

use spkm\FortiNac\Requests\ListRequest;

/**
 * Get list of RADIUS attribute groups, returns name and id of each: GET /radius/attrgroups/list.
 */
class GetRadiusAttributeGroupListRequest extends ListRequest
{
    public function resolveEndpoint(): string
    {
        return '/radius/attrgroups/list';
    }
}
