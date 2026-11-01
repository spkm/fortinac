<?php

namespace spkm\FortiNac\Resources\User;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\User\User;
use spkm\FortiNac\Data\User\UserSearch;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\User\User\CountAllUsersRequest;
use spkm\FortiNac\Requests\User\User\CountUsersRequest;
use spkm\FortiNac\Requests\User\User\CreateUserRequest;
use spkm\FortiNac\Requests\User\User\DeleteManyUsersRequest;
use spkm\FortiNac\Requests\User\User\DeleteUserRequest;
use spkm\FortiNac\Requests\User\User\DeleteUserViaPostRequest;
use spkm\FortiNac\Requests\User\User\DisableManyUsersRequest;
use spkm\FortiNac\Requests\User\User\DisableUserRequest;
use spkm\FortiNac\Requests\User\User\EnableManyUsersRequest;
use spkm\FortiNac\Requests\User\User\EnableUserRequest;
use spkm\FortiNac\Requests\User\User\GetUserAllowHostsRequest;
use spkm\FortiNac\Requests\User\User\GetUserGetAgentRequest;
use spkm\FortiNac\Requests\User\User\GetUserGetPolicyRequest;
use spkm\FortiNac\Requests\User\User\GetUserHasHostsRequest;
use spkm\FortiNac\Requests\User\User\GetUserIdByIdRequest;
use spkm\FortiNac\Requests\User\User\GetUserSearchUserByUserIDRequest;
use spkm\FortiNac\Requests\User\User\GetUsersRequest;
use spkm\FortiNac\Requests\User\User\GetUserUsageRequest;
use spkm\FortiNac\Requests\User\User\PostUserAllowHostsRequest;
use spkm\FortiNac\Requests\User\User\SetUserPasswordRequest;
use spkm\FortiNac\Requests\User\User\SetUserProfileRequest;
use spkm\FortiNac\Requests\User\User\SetUserRoleRequest;
use spkm\FortiNac\Requests\User\User\UpdateUserRequest;

/**
 * User Record, from FortiNac::user().
 *
 * @extends Builder<User>
 */
class UserResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, User::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetUsersRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountUsersRequest($query);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateUserRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateUserRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteUserRequest((int) $id, $options);
    }

    /**
     * Returns the number of allowed hosts set per user: GET /user/allow-hosts.
     */
    public function allowHosts(): mixed
    {
        return $this->fetch(new GetUserAllowHostsRequest);
    }

    /**
     * Returns the user record with the supplied DBID: GET /user/id/{id}.
     */
    public function idById(int $id): ?User
    {
        return $this->fetchOrNull(new GetUserIdByIdRequest($id));
    }

    /**
     * Returns a count of all user records in the database: GET /user/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllUsersRequest);
    }

    /**
     * Returns a boolean result if the user is the owner of one or more hosts: GET /user/has-hosts.
     */
    public function hasHosts(): mixed
    {
        return $this->fetch(new GetUserHasHostsRequest);
    }

    /**
     * Returns the policy info for a user based on the provided user it: GET /user/{id}/get-policy.
     */
    public function getPolicy(int $id): mixed
    {
        return $this->fetch(new GetUserGetPolicyRequest($id));
    }

    /**
     * Returns a list of records that reference this user record: GET /user/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetUserUsageRequest($id));
    }

    /**
     * Retrieves user info from directory: GET /user/search-user-by-userID.
     *
     * @param  array<string, mixed>  $options  Query options: userID, createNCMUser
     */
    public function searchUserByUserID(array $options = []): ?UserSearch
    {
        return $this->fetchOrNull(new GetUserSearchUserByUserIDRequest($options));
    }

    /**
     * Retrieves the agent info for a User based on the platform: GET /user/{id}/get-agent.
     *
     * @param  array<string, mixed>  $options  Query options: id, platform
     */
    public function getAgent(int $id, array $options = []): mixed
    {
        return $this->fetch(new GetUserGetAgentRequest($id, $options));
    }

    /**
     * Sets the limit for number of hosts allowed per user: POST /user/allow-hosts.
     *
     * @param  array<string, mixed>  $options
     */
    public function allowHosts2(array $options = []): bool
    {
        return $this->perform(new PostUserAllowHostsRequest($options));
    }

    /**
     * Deletes the user record or records supplied, if they are not currently in use: POST /user/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyUsersRequest(['id' => $ids]));
    }

    /**
     * Disables the User that matches the supplied DBID: POST /user/disable.
     *
     * @param  array<string, mixed>  $options  Query options: userID
     */
    public function disableMany(array $options = []): bool
    {
        return $this->perform(new DisableManyUsersRequest($options));
    }

    /**
     * Enables the User that matches the supplied DBID: POST /user/enable.
     *
     * @param  array<string, mixed>  $options  Query options: userID
     */
    public function enableMany(array $options = []): bool
    {
        return $this->perform(new EnableManyUsersRequest($options));
    }

    /**
     * Disables the User that matches the supplied DBID: POST /user/{id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $id, array $options = []): bool
    {
        return $this->perform(new DisableUserRequest($id, $options));
    }

    /**
     * Enables the User that matches the supplied DBID: POST /user/{id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): bool
    {
        return $this->perform(new EnableUserRequest($id, $options));
    }

    /**
     * Sets the Role for a list of users: POST /user/set-role.
     *
     * @param  array<string, mixed>  $options  Query options: id, role
     */
    public function setRole(array $options = []): bool
    {
        return $this->perform(new SetUserRoleRequest($options));
    }

    /**
     * Sets the specified Admin Profile for the supplied set of Admin Users: POST /user/set-profile.
     *
     * @param  array<string, mixed>  $options  Query options: profileID, id
     */
    public function setProfile(array $options = []): bool
    {
        return $this->perform(new SetUserProfileRequest($options));
    }

    /**
     * Sets the password of a local user account: POST /user/set-password.
     *
     * @param  array<string, mixed>  $options  Query options: userID, password
     */
    public function setPassword(array $options = []): bool
    {
        return $this->perform(new SetUserPasswordRequest($options));
    }

    /**
     * Deletes the user record or records supplied, if they are not currently in use: POST /user/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteUserViaPostRequest($id, $options));
    }
}
