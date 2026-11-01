<?php

namespace spkm\FortiNac\Requests\Radius\RadiusAttributeGroup;

use spkm\FortiNac\Data\Radius\RadiusAttributeGroup;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Support\Path;

/**
 * Get RADIUS attribute group by name: GET /radius/attrgroups/name/{groupName}.
 */
class GetRadiusAttributeGroupNameByGroupNameRequest extends ListRequest
{
    protected ?string $dto = RadiusAttributeGroup::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $groupName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/radius/attrgroups/name/'.Path::segment($this->groupName);
    }
}
