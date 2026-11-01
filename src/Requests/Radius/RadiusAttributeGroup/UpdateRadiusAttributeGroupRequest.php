<?php

namespace spkm\FortiNac\Requests\Radius\RadiusAttributeGroup;

use JsonSerializable;
use spkm\FortiNac\Data\Radius\RadiusAttributeGroup;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Update RADIUS attribute group by ID: POST /radius/attrgroups/{id}.
 */
class UpdateRadiusAttributeGroupRequest extends WriteRequest
{
    protected ?string $dto = RadiusAttributeGroup::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/radius/attrgroups/'.$this->id;
    }
}
