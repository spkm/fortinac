<?php

namespace spkm\FortiNac\Resources\Policy;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Policy\RoleMapping;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\CreateRoleMappingRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\DeleteManyRoleMappingsRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\DeleteRoleMappingRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\DeleteRoleMappingViaPostRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\GetRoleMappingDirectConfigurationRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\GetRoleMappingMembershipRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\GetRoleMappingRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\GetRoleMappingsRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\GetRoleMappingSupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\GetRoleMappingUsageRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\SetRoleMappingRankRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\SwapRoleMappingRanksRequest;
use spkm\FortiNac\Requests\Policy\RoleMapping\UpdateRoleMappingRequest;

/**
 * Role, from FortiNac::policy()->roleMappings().
 *
 * @extends Builder<RoleMapping>
 */
class RoleMappingResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, RoleMapping::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRoleMappingsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetRoleMappingRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateRoleMappingRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateRoleMappingRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteRoleMappingRequest($this->intId($id), $options);
    }

    /**
     * Returns a list of records that reference this role mapping record: GET /policy/role-mapping/{id}/usage.
     *
     * @param  array<string, mixed>  $options  Query options: id
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, array $options = []): Collection
    {
        return $this->fetch(new GetRoleMappingUsageRequest($id, $options));
    }

    /**
     * Retrieves information necessary to create or modify a role mapping, such as Roles, Port and Device Groups, and CLI configurations: GET /policy/role-mapping/supporting-info.
     */
    public function supportingInfo(): mixed
    {
        return $this->fetch(new GetRoleMappingSupportingInfoRequest);
    }

    /**
     * Retrieves the current state of the Direct Configuration flag, used for determining if the legacy configuration mode is available: GET /policy/role-mapping/direct-configuration.
     */
    public function directConfiguration(): mixed
    {
        return $this->fetch(new GetRoleMappingDirectConfigurationRequest);
    }

    /**
     * View a list of the role(s) assigned to the selected device or port and the network access ID for that role on the device: GET /policy/role-mapping/membership.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, RoleMapping>
     */
    public function membership(Query|array $query = []): Collection
    {
        return $this->fetch(new GetRoleMappingMembershipRequest($query));
    }

    /**
     * Delete a list of role mapping records supplied under the id parameter: POST /policy/role-mapping/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyRoleMappingsRequest(['id' => $ids]));
    }

    /**
     * Delete a single role mapping record by ID: POST /policy/role-mapping/{id}/delete.
     *
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteRoleMappingViaPostRequest($id, $options));
    }

    /**
     * Sets the rank of supplied role mapping, shifting other ranks as necessary: POST /policy/role-mapping/rank/set.
     *
     * @param  array<string, mixed>  $options  Query options: id, rank
     */
    public function setRank(array $options = []): bool
    {
        return $this->perform(new SetRoleMappingRankRequest($options));
    }

    /**
     * Swaps the rank position of the two supplied role mappings: POST /policy/role-mapping/rank/swap.
     *
     * @param  array<string, mixed>  $options  Query options: id1, id2
     */
    public function swapRanks(array $options = []): bool
    {
        return $this->perform(new SwapRoleMappingRanksRequest($options));
    }
}
