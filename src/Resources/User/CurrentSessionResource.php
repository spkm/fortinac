<?php

namespace spkm\FortiNac\Resources\User;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\User\CurrentSessionBookmark;
use spkm\FortiNac\Data\User\SessionTimeout;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\User\CurrentSession\AcceptCurrentSessionUsagePolicyRequest;
use spkm\FortiNac\Requests\User\CurrentSession\DeleteCurrentSessionBookmarkByIdRequest;
use spkm\FortiNac\Requests\User\CurrentSession\GetCurrentSessionBookmarkRequest;
use spkm\FortiNac\Requests\User\CurrentSession\GetCurrentSessionCacheRequest;
use spkm\FortiNac\Requests\User\CurrentSession\GetCurrentSessionFeatureVisibilityRequest;
use spkm\FortiNac\Requests\User\CurrentSession\GetCurrentSessionNavigationSettingsRequest;
use spkm\FortiNac\Requests\User\CurrentSession\GetCurrentSessionSecurityKeyRequest;
use spkm\FortiNac\Requests\User\CurrentSession\GetCurrentSessionTimeoutRequest;
use spkm\FortiNac\Requests\User\CurrentSession\InitializeCurrentSessionRootUserRequest;
use spkm\FortiNac\Requests\User\CurrentSession\LoginCurrentSessionRequest;
use spkm\FortiNac\Requests\User\CurrentSession\LogoutCurrentSessionRequest;
use spkm\FortiNac\Requests\User\CurrentSession\PostCurrentSessionBookmarkByIdRequest;
use spkm\FortiNac\Requests\User\CurrentSession\PostCurrentSessionBookmarkDelete2Request;
use spkm\FortiNac\Requests\User\CurrentSession\PostCurrentSessionBookmarkDeleteRequest;
use spkm\FortiNac\Requests\User\CurrentSession\PostCurrentSessionBookmarkRequest;
use spkm\FortiNac\Requests\User\CurrentSession\PostCurrentSessionBookmarkSyncRequest;
use spkm\FortiNac\Requests\User\CurrentSession\PostCurrentSessionBookmarkUuidDeleteRequest;
use spkm\FortiNac\Requests\User\CurrentSession\PostCurrentSessionCacheRequest;
use spkm\FortiNac\Requests\User\CurrentSession\PostCurrentSessionFeatureVisibilityRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * User, from FortiNac::user()->currentSession().
 *
 * @extends BaseResource<Data>
 */
class CurrentSessionResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Returns the cached value in the current user session. Used by the GUI for storing temporary values that don't belong in the database: GET /user/current-session/cache.
     *
     * @param  array<string, mixed>  $options  Query options: key
     */
    public function cache(array $options = []): mixed
    {
        return $this->fetch(new GetCurrentSessionCacheRequest($options));
    }

    /**
     * Returns the currently enabled features for the system. This is a global setting for all users: GET /user/current-session/feature-visibility.
     */
    public function featureVisibility(): mixed
    {
        return $this->fetch(new GetCurrentSessionFeatureVisibilityRequest);
    }

    /**
     * Returns a list of User Bookmark records matching the supplied filter: GET /user/current-session/bookmark.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, CurrentSessionBookmark>
     */
    public function bookmark(Query|array $query = []): Collection
    {
        return $this->fetch(new GetCurrentSessionBookmarkRequest($query));
    }

    /**
     * Returns the number of seconds until the session for the current user expires: GET /user/current-session/timeout.
     */
    public function timeout(): ?SessionTimeout
    {
        return $this->fetchOrNull(new GetCurrentSessionTimeoutRequest);
    }

    /**
     * Returns the Security Key for the current session that must be appended to every request to verify its source: GET /user/current-session/securityKey.
     */
    public function securityKey(): mixed
    {
        return $this->fetch(new GetCurrentSessionSecurityKeyRequest);
    }

    /**
     * Returns the full set of navigation available and favorited by the user, including any custom dashboards and navigation features settings: GET /user/current-session/navigation-settings.
     */
    public function navigationSettings(): mixed
    {
        return $this->fetch(new GetCurrentSessionNavigationSettingsRequest);
    }

    /**
     * Updates a User Bookmark record: POST /user/current-session/bookmark/{id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function bookmarkById(int $id, array|Data $attributes = [], array $options = []): ?CurrentSessionBookmark
    {
        return $this->fetch(new PostCurrentSessionBookmarkByIdRequest($id, $this->payloadOf($attributes), $options));
    }

    /**
     * Deletes a list of User Bookmark records supplied under the id parameter: POST /user/current-session/bookmark/uuid/{uuid}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function bookmarkUuidDelete(int $uuid, array $options = []): bool
    {
        return $this->perform(new PostCurrentSessionBookmarkUuidDeleteRequest($uuid, $options));
    }

    /**
     * Creates a new User Bookmark record, updating instead if the supplied policy has a DBID of one that already exists: POST /user/current-session/bookmark.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function bookmark2(array|Data $attributes = [], array $options = []): ?CurrentSessionBookmark
    {
        return $this->fetch(new PostCurrentSessionBookmarkRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Deletes a single user bookmark record by ID: POST /user/current-session/bookmark/delete.
     *
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function bookmarkDelete(array $options = []): bool
    {
        return $this->perform(new PostCurrentSessionBookmarkDeleteRequest($options));
    }

    /**
     * Deletes a single user bookmark record by ID: POST /user/current-session/bookmark/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function bookmarkDelete2(int $id, array $options = []): bool
    {
        return $this->perform(new PostCurrentSessionBookmarkDelete2Request($id, $options));
    }

    /**
     * Returns the value in the current user session. Used by the GUI for storing temporary values that don't belong in the database: POST /user/current-session/cache.
     *
     * @param  array<string, mixed>  $options  Query options: key, value
     */
    public function cache2(array $options = []): bool
    {
        return $this->perform(new PostCurrentSessionCacheRequest($options));
    }

    /**
     * Synchronizes the bookmarks for the current user to match the set of supplied UUIDs: POST /user/current-session/bookmark/sync.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function bookmarkSync(array|Data $attributes = [], array $options = []): bool
    {
        return $this->perform(new PostCurrentSessionBookmarkSyncRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Sets the currently enabled features for the system. This is a global settings for all users: POST /user/current-session/feature-visibility.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function featureVisibility2(array|Data $attributes = [], array $options = []): bool
    {
        return $this->perform(new PostCurrentSessionFeatureVisibilityRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Performs a login which accepts the Acceptable Usage Policy. The login step must be repeated because the session is not valid until the Acceptable Usage Policy is accepted: POST /user/current-session/initialize-root-user.
     *
     * @param  array<string, mixed>  $options  Query options: user, password, newUserIdD, newPassword
     */
    public function initializeRootUser(array $options = []): bool
    {
        return $this->perform(new InitializeCurrentSessionRootUserRequest($options));
    }

    /**
     * Authenticates the user and, if successful, returns the Security Key for current session that must be appended to every request to verify its source: POST /user/current-session/login.
     *
     * @param  array<string, mixed>  $options  Query options: user, password
     */
    public function login(array $options = []): bool
    {
        return $this->perform(new LoginCurrentSessionRequest($options));
    }

    /**
     * Ends and invalidates the current login session: POST /user/current-session/logout.
     *
     * @param  array<string, mixed>  $options
     */
    public function logout(array $options = []): bool
    {
        return $this->perform(new LogoutCurrentSessionRequest($options));
    }

    /**
     * Performs a login which accepts the Acceptable Usage Policy. The login step must be repeated because the session is not valid until the Acceptable Usage Policy is accepted: POST /user/current-session/accept-usage-policy.
     *
     * @param  array<string, mixed>  $options  Query options: user, password
     */
    public function acceptUsagePolicy(array $options = []): bool
    {
        return $this->perform(new AcceptCurrentSessionUsagePolicyRequest($options));
    }

    /**
     * Deletes a single user bookmark record by ID: DELETE /user/current-session/bookmark/{id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteBookmarkById(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteCurrentSessionBookmarkByIdRequest($id, $options));
    }
}
