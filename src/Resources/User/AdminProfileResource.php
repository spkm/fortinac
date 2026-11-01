<?php

namespace spkm\FortiNac\Resources\User;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\User\AdminProfile;
use spkm\FortiNac\Data\User\AdminProfileMapping;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\User\AdminProfile\CreateAdminProfileRequest;
use spkm\FortiNac\Requests\User\AdminProfile\DeleteAdminProfileMappingByIdRequest;
use spkm\FortiNac\Requests\User\AdminProfile\DeleteAdminProfileRequest;
use spkm\FortiNac\Requests\User\AdminProfile\DeleteAdminProfileViaPostRequest;
use spkm\FortiNac\Requests\User\AdminProfile\DeleteManyAdminProfilesRequest;
use spkm\FortiNac\Requests\User\AdminProfile\GetAdminProfileMappingByIdRequest;
use spkm\FortiNac\Requests\User\AdminProfile\GetAdminProfileMappingRequest;
use spkm\FortiNac\Requests\User\AdminProfile\GetAdminProfileMappingSupportingInfoRequest;
use spkm\FortiNac\Requests\User\AdminProfile\GetAdminProfileNewRequest;
use spkm\FortiNac\Requests\User\AdminProfile\GetAdminProfilePermissionViewMapRequest;
use spkm\FortiNac\Requests\User\AdminProfile\GetAdminProfileRequest;
use spkm\FortiNac\Requests\User\AdminProfile\GetAdminProfilesRequest;
use spkm\FortiNac\Requests\User\AdminProfile\GetAdminProfileUsageRequest;
use spkm\FortiNac\Requests\User\AdminProfile\PostAdminProfileMappingByIdRequest;
use spkm\FortiNac\Requests\User\AdminProfile\PostAdminProfileMappingDeleteRequest;
use spkm\FortiNac\Requests\User\AdminProfile\PostAdminProfileMappingRankSetRequest;
use spkm\FortiNac\Requests\User\AdminProfile\PostAdminProfileMappingRankSwapRequest;
use spkm\FortiNac\Requests\User\AdminProfile\PostAdminProfileMappingRequest;
use spkm\FortiNac\Requests\User\AdminProfile\UpdateAdminProfileRequest;

/**
 * Admin Profile, from FortiNac::user()->adminProfiles().
 *
 * @extends Builder<AdminProfile>
 */
class AdminProfileResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, AdminProfile::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAdminProfilesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetAdminProfileRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateAdminProfileRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateAdminProfileRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteAdminProfileRequest($this->intId($id), $options);
    }

    /**
     * Deletes a single Admin Profile Mapping record by ID: DELETE /user/admin-profile/mapping/{id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteMappingById(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteAdminProfileMappingByIdRequest($id, $options));
    }

    /**
     * Returns a list of records that reference this Admin Profile record by ID: GET /user/admin-profile/{id}/usage.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetAdminProfileUsageRequest($id, $query));
    }

    /**
     * Returns a list of Admin Profile Mapping records matching the supplied filter: GET /user/admin-profile/mapping.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, AdminProfileMapping>
     */
    public function mapping(Query|array $query = []): Collection
    {
        return $this->fetch(new GetAdminProfileMappingRequest($query));
    }

    /**
     * Returns a list of Admin Profile Mapping records matching the supplied filter: GET /user/admin-profile/mapping/{id}.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, AdminProfileMapping>
     */
    public function mappingById(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetAdminProfileMappingByIdRequest($id, $query));
    }

    /**
     * Retrieves information necessary to create or modify an Admin Profile Mapping: GET /user/admin-profile/mapping/supporting-info.
     */
    public function mappingSupportingInfo(): mixed
    {
        return $this->fetch(new GetAdminProfileMappingSupportingInfoRequest);
    }

    /**
     * Returns a new, empty Admin Profile that can be used to check the available permission sets: GET /user/admin-profile/new.
     */
    public function new(): ?AdminProfile
    {
        return $this->fetchOrNull(new GetAdminProfileNewRequest);
    }

    /**
     * Returns a map of Permission Sets to Views: GET /user/admin-profile/permission-view-map.
     */
    public function permissionViewMap(): mixed
    {
        return $this->fetch(new GetAdminProfilePermissionViewMapRequest);
    }

    /**
     * Deletes a list of Admin Profile records supplied by the id parameter: POST /user/admin-profile/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyAdminProfilesRequest(['id' => $ids]));
    }

    /**
     * Deletes a single Admin Profile record by ID: POST /user/admin-profile/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteAdminProfileViaPostRequest($id, $options));
    }

    /**
     * Creates a new Admin Profile Mapping record, updating instead if the supplied profile has a DBID of one that already exists: POST /user/admin-profile/mapping.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function mapping2(array|Data $attributes = [], array $options = []): ?AdminProfileMapping
    {
        return $this->fetch(new PostAdminProfileMappingRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Deletes a list of Admin Profile Mapping records supplied under the id parameter: POST /user/admin-profile/mapping/delete.
     *
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function mappingDelete(array $options = []): bool
    {
        return $this->perform(new PostAdminProfileMappingDeleteRequest($options));
    }

    /**
     * Updates an Admin Profile Mapping record: POST /user/admin-profile/mapping/{id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function mappingById2(int $id, array|Data $attributes = [], array $options = []): ?AdminProfileMapping
    {
        return $this->fetch(new PostAdminProfileMappingByIdRequest($id, $this->payloadOf($attributes), $options));
    }

    /**
     * Sets the rank of the supplied Admin Profile Mapping, shifting other ranks as necessary: POST /user/admin-profile/mapping/rank/set.
     *
     * @param  array<string, mixed>  $options  Query options: id, rank
     */
    public function mappingRankSet(array $options = []): bool
    {
        return $this->perform(new PostAdminProfileMappingRankSetRequest($options));
    }

    /**
     * Swaps the rank position of the two supplied Admin Profile Mappings: POST /user/admin-profile/mapping/rank/swap.
     *
     * @param  array<string, mixed>  $options  Query options: id1, id2
     */
    public function mappingRankSwap(array $options = []): bool
    {
        return $this->perform(new PostAdminProfileMappingRankSwapRequest($options));
    }
}
