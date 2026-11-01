<?php

namespace spkm\FortiNac\Resources\Policy;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Policy\UserHostProfile;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\UserHostProfile\CreateUserHostProfileRequest;
use spkm\FortiNac\Requests\Policy\UserHostProfile\DeleteManyUserHostProfilesRequest;
use spkm\FortiNac\Requests\Policy\UserHostProfile\DeleteUserHostProfileRequest;
use spkm\FortiNac\Requests\Policy\UserHostProfile\DeleteUserHostProfileViaPostRequest;
use spkm\FortiNac\Requests\Policy\UserHostProfile\GetUserHostProfileRequest;
use spkm\FortiNac\Requests\Policy\UserHostProfile\GetUserHostProfilesRequest;
use spkm\FortiNac\Requests\Policy\UserHostProfile\GetUserHostProfileSupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\UserHostProfile\GetUserHostProfileUsageRequest;
use spkm\FortiNac\Requests\Policy\UserHostProfile\UpdateUserHostProfileRequest;

/**
 * User Host Profile, from FortiNac::policy()->userHostProfiles().
 *
 * @extends Builder<UserHostProfile>
 */
class UserHostProfileResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, UserHostProfile::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetUserHostProfilesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetUserHostProfileRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateUserHostProfileRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateUserHostProfileRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteUserHostProfileRequest($this->intId($id), $options);
    }

    /**
     * Returns a list of records that reference this User/Host Profile record: GET /policy/user-host-profile/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetUserHostProfileUsageRequest($id));
    }

    /**
     * Returns a series of related data records used to create User/Host Profiles: GET /policy/user-host-profile/supporting-info.
     */
    public function supportingInfo(): mixed
    {
        return $this->fetch(new GetUserHostProfileSupportingInfoRequest);
    }

    /**
     * Deletes a list of User/Host Profile records supplied under the id parameter: POST /policy/user-host-profile/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyUserHostProfilesRequest(['id' => $ids]));
    }

    /**
     * Deletes a single User/Host Profile record by ID: POST /policy/user-host-profile/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteUserHostProfileViaPostRequest($id, $options));
    }
}
