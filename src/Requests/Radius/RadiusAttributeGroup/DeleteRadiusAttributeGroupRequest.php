<?php

namespace spkm\FortiNac\Requests\Radius\RadiusAttributeGroup;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Delete RADIUS attribute group by ID: DELETE /radius/attrgroups/{id}.
 */
class DeleteRadiusAttributeGroupRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/radius/attrgroups/'.$this->id;
    }
}
