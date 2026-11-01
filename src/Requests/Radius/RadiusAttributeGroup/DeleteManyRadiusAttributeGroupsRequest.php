<?php

namespace spkm\FortiNac\Requests\Radius\RadiusAttributeGroup;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Delete multiple RADIUS attribute groups by ID: POST /radius/attrgroups/delete.
 *
 * Parameters: Id.
 */
class DeleteManyRadiusAttributeGroupsRequest extends ActionRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/radius/attrgroups/delete';
    }
}
