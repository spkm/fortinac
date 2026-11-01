<?php

namespace spkm\FortiNac\Resources\Radius;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Radius\RadiusAttributeGroup;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\CreateRadiusAttributeGroupRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\DeleteManyRadiusAttributeGroupsRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\DeleteRadiusAttributeGroupModelcfgByDeviceIdRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\DeleteRadiusAttributeGroupRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\GetRadiusAttributeGroupListRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\GetRadiusAttributeGroupModelcfgByDeviceIdRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\GetRadiusAttributeGroupNameByGroupNameRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\GetRadiusAttributeGroupRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\GetRadiusAttributeGroupResponsevaluesByLogicalNetworkAttrGrpIdRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\GetRadiusAttributeGroupsRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\GetRadiusAttributeGroupUsageRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\PostRadiusAttributeGroupModelcfgByAttrGroupIdRequest;
use spkm\FortiNac\Requests\Radius\RadiusAttributeGroup\UpdateRadiusAttributeGroupRequest;

/**
 * Radius Attribute Group Configuration, from FortiNac::radius()->attributeGroups().
 *
 * @extends Builder<RadiusAttributeGroup>
 */
class RadiusAttributeGroupResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, RadiusAttributeGroup::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRadiusAttributeGroupsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetRadiusAttributeGroupRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateRadiusAttributeGroupRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateRadiusAttributeGroupRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteRadiusAttributeGroupRequest((int) $id, $options);
    }

    /**
     * Get the RADIUS attribute group ID for the specified device ID, or if specified it's logical network: GET /radius/attrgroups/modelcfg/{deviceId}.
     *
     * @param  array<string, mixed>  $options  Query options: logicalNetwork
     */
    public function modelcfgByDeviceId(int $deviceId, array $options = []): mixed
    {
        return $this->fetch(new GetRadiusAttributeGroupModelcfgByDeviceIdRequest($deviceId, $options));
    }

    /**
     * Get RADIUS attribute group by name: GET /radius/attrgroups/name/{groupName}.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, RadiusAttributeGroup>
     */
    public function nameByGroupName(string $groupName, Query|array $query = []): Collection
    {
        return $this->fetch(new GetRadiusAttributeGroupNameByGroupNameRequest($groupName, $query));
    }

    /**
     * Get the usage data for the specified attribute group: GET /radius/attrgroups/{attrGroupId}/usage.
     */
    public function usage(int $attrGroupId): mixed
    {
        return $this->fetch(new GetRadiusAttributeGroupUsageRequest($attrGroupId));
    }

    /**
     * Get list of RADIUS attribute groups, returns name and id of each: GET /radius/attrgroups/list.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function listAll(Query|array $query = []): Collection
    {
        return $this->fetch(new GetRadiusAttributeGroupListRequest($query));
    }

    /**
     * Get the response values for the device attribute group ID and logical network attribute group ID: GET /radius/attrgroups/responsevalues/{deviceAttrGrpId}/{logicalNetworkAttrGrpId}.
     */
    public function responsevaluesByLogicalNetworkAttrGrpId(int $deviceAttrGrpId, int $logicalNetworkAttrGrpId): mixed
    {
        return $this->fetch(new GetRadiusAttributeGroupResponsevaluesByLogicalNetworkAttrGrpIdRequest($deviceAttrGrpId, $logicalNetworkAttrGrpId));
    }

    /**
     * Delete multiple RADIUS attribute groups by ID: POST /radius/attrgroups/delete.
     *
     * @param  array<string, mixed>  $options  Query options: Id
     */
    public function deleteMany(array $options = []): mixed
    {
        return $this->fetch(new DeleteManyRadiusAttributeGroupsRequest($options));
    }

    /**
     * Assign the RADIUS attribute group ID to the specified device ID, or if specified it's logical network: POST /radius/attrgroups/modelcfg/{deviceId}/{attrGroupId}.
     *
     * @param  array<string, mixed>  $options  Query options: logicalNetwork
     */
    public function modelcfgByAttrGroupId(int $deviceId, int $attrGroupId, array $options = []): mixed
    {
        return $this->fetch(new PostRadiusAttributeGroupModelcfgByAttrGroupIdRequest($deviceId, $attrGroupId, $options));
    }

    /**
     * Delete the RADIUS attribute group ID(if one exists) for the model configuration ID, or if specified it's logical network: DELETE /radius/attrgroups/modelcfg/{deviceId}.
     *
     * @param  array<string, mixed>  $options  Query options: logicalNetwork
     */
    public function deleteModelcfgByDeviceId(int $deviceId, array $options = []): bool
    {
        return $this->perform(new DeleteRadiusAttributeGroupModelcfgByDeviceIdRequest($deviceId, $options));
    }
}
