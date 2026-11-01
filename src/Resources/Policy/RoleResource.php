<?php

namespace spkm\FortiNac\Resources\Policy;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Policy\Role;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\Role\CreateRoleRequest;
use spkm\FortiNac\Requests\Policy\Role\DeleteManyRolesRequest;
use spkm\FortiNac\Requests\Policy\Role\DeleteRoleRequest;
use spkm\FortiNac\Requests\Policy\Role\DeleteRoleViaPostRequest;
use spkm\FortiNac\Requests\Policy\Role\GetRoleRequest;
use spkm\FortiNac\Requests\Policy\Role\GetRoleSimpleRequest;
use spkm\FortiNac\Requests\Policy\Role\GetRolesRequest;
use spkm\FortiNac\Requests\Policy\Role\GetRoleSupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\Role\PostRoleUsageRequest;
use spkm\FortiNac\Requests\Policy\Role\SetRoleRankRequest;
use spkm\FortiNac\Requests\Policy\Role\SwapRoleRanksRequest;
use spkm\FortiNac\Requests\Policy\Role\UpdateRoleRequest;

/**
 * Role, from FortiNac::policy()->roles().
 *
 * @extends Builder<Role>
 */
class RoleResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, Role::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRolesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetRoleRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateRoleRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateRoleRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteRoleRequest((int) $id, $options);
    }

    /**
     * Returns a list of role records that reference this record: POST /policy/role/{id}/usage.
     *
     * @param  array<string, mixed>  $options
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, array $options = []): Collection
    {
        return $this->fetch(new PostRoleUsageRequest($id, $options));
    }

    /**
     * Returns the Name and ID of all Roles: GET /policy/role/simple.
     */
    public function simple(): bool
    {
        return $this->perform(new GetRoleSimpleRequest);
    }

    /**
     * Retrieves information necessary to create or modify a role, such as Host and User groups: GET /policy/role/supporting-info.
     */
    public function supportingInfo(): bool
    {
        return $this->perform(new GetRoleSupportingInfoRequest);
    }

    /**
     * Deletes a list of role records supplied under the id parameter: POST /policy/role/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyRolesRequest(['id' => $ids]));
    }

    /**
     * Deletes a single role record by ID: POST /policy/role/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteRoleViaPostRequest($id, $options));
    }

    /**
     * Sets the rank of the supplied role, shifting other ranks as necessary: POST /policy/role/rank/set.
     *
     * @param  array<string, mixed>  $options  Query options: id, rank
     */
    public function setRank(array $options = []): bool
    {
        return $this->perform(new SetRoleRankRequest($options));
    }

    /**
     * Swaps the rank position of the two supplied roles: POST /policy/role/rank/swap.
     *
     * @param  array<string, mixed>  $options  Query options: id1, id2
     */
    public function swapRanks(array $options = []): bool
    {
        return $this->perform(new SwapRoleRanksRequest($options));
    }
}
