<?php

namespace spkm\FortiNac\Resources\Host;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Host\Host;
use spkm\FortiNac\Data\Host\HostClientFiltersCachedByName;
use spkm\FortiNac\Data\Host\HostDeviceType;
use spkm\FortiNac\Data\Host\HostHealthHistory;
use spkm\FortiNac\Data\Host\HostMultifilter;
use spkm\FortiNac\Data\Host\HostNcmPod;
use spkm\FortiNac\Data\Host\HostsForUser;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Host\Host\CountAllHostsRequest;
use spkm\FortiNac\Requests\Host\Host\CountHostsRequest;
use spkm\FortiNac\Requests\Host\Host\CreateHostRequest;
use spkm\FortiNac\Requests\Host\Host\DeleteHostRequest;
use spkm\FortiNac\Requests\Host\Host\DeleteHostViaPostRequest;
use spkm\FortiNac\Requests\Host\Host\DeleteManyHostsRequest;
use spkm\FortiNac\Requests\Host\Host\DisableHostByIpRequest;
use spkm\FortiNac\Requests\Host\Host\DisableHostByMacRequest;
use spkm\FortiNac\Requests\Host\Host\DisableHostRequest;
use spkm\FortiNac\Requests\Host\Host\EnableHostByIpRequest;
use spkm\FortiNac\Requests\Host\Host\EnableHostByMacRequest;
use spkm\FortiNac\Requests\Host\Host\EnableHostRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostByIpRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostByMacRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostClientFiltersCachedByNameRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostClientFiltersRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostConnectedToPortRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostDeviceTypesRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostForUserRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostGlobalAllowedHostsRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostHealthHistoryRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostMultifilterRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostMultifilterUsersRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostNcmPodsRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostPolicyRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostSearchRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostsRequest;
use spkm\FortiNac\Requests\Host\Host\GetHostUsageRequest;
use spkm\FortiNac\Requests\Host\Host\ImportHostHostsRequest;
use spkm\FortiNac\Requests\Host\Host\PostHostWithAdaptersByIdRequest;
use spkm\FortiNac\Requests\Host\Host\PostHostWithAdaptersRequest;
use spkm\FortiNac\Requests\Host\Host\RegisterHostAsDeviceRequest;
use spkm\FortiNac\Requests\Host\Host\RescanHostWithProfileRequest;
use spkm\FortiNac\Requests\Host\Host\SendHostPersistentAgentMessageRequest;
use spkm\FortiNac\Requests\Host\Host\SetHostExpirationRequest;
use spkm\FortiNac\Requests\Host\Host\SetHostHealthRequest;
use spkm\FortiNac\Requests\Host\Host\SetHostLoggedOnUserRequest;
use spkm\FortiNac\Requests\Host\Host\SetHostRoleRequest;
use spkm\FortiNac\Requests\Host\Host\UpdateHostPersistentAgentRequest;
use spkm\FortiNac\Requests\Host\Host\UpdateHostRequest;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Host Record, from FortiNac::host().
 *
 * @extends Builder<Host>
 */
class HostResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, Host::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetHostsRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountHostsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetHostRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateHostRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateHostRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteHostRequest((int) $id, $options);
    }

    /**
     * Returns the Host Record that matches the supplied IP address: GET /host/by-ip/{ip}.
     */
    public function findByIp(string $ip): ?Host
    {
        return $this->fetchOrNull(new GetHostByIpRequest($ip));
    }

    /**
     * Returns the Host Record that matches the supplied MAC address: GET /host/by-mac/{mac}.
     */
    public function findByMac(string $mac): ?Host
    {
        return $this->fetchOrNull(new GetHostByMacRequest($mac));
    }

    /**
     * Returns the count of all Host Records in the database: GET /host/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllHostsRequest);
    }

    /**
     * Returns all private Client Filters, used multifilter queries. If allowed, shared Client Filters are also included: GET /host/device-types.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, HostDeviceType>
     */
    public function deviceTypes(Query|array $query = []): Collection
    {
        return $this->fetch(new GetHostDeviceTypesRequest($query));
    }

    /**
     * Returns a list of Host Records connected to the port id provided: GET /host/connected-to-port.
     *
     * @param  array<string, mixed>  $options  Query options: portID
     */
    public function connectedToPort(array $options = []): mixed
    {
        return $this->fetch(new GetHostConnectedToPortRequest($options));
    }

    /**
     * Returns a list of records that reference this Host Record: GET /host/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetHostUsageRequest($id));
    }

    /**
     * Returns a list of Host Records for the user object with the provided id: GET /host/for-user.
     *
     * @param  array<string, mixed>  $options  Query options: userID
     */
    public function forUser(array $options = []): ?HostsForUser
    {
        return $this->fetchOrNull(new GetHostForUserRequest($options));
    }

    /**
     * Returns the count of allowed Host Records on this system: GET /host/global-allowed-hosts.
     */
    public function globalAllowedHosts(): mixed
    {
        return $this->fetch(new GetHostGlobalAllowedHostsRequest);
    }

    /**
     * Returns the cached filter with the supplied name: GET /host/client-filters/cached/{name}.
     */
    public function clientFiltersCachedByName(string $name): ?HostClientFiltersCachedByName
    {
        return $this->fetchOrNull(new GetHostClientFiltersCachedByNameRequest($name));
    }

    /**
     * Returns the policy info for a Host Record based on the provided id: GET /host/{id}/policy.
     *
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function policy(int $id, array $options = []): bool
    {
        return $this->perform(new GetHostPolicyRequest($id, $options));
    }

    /**
     * Returns all private Client Filters, used for multi-filter queries. If allowed, shared Client Filters are also included: GET /host/client-filters.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, HostClientFiltersCachedByName>
     */
    public function clientFilters(Query|array $query = []): Collection
    {
        return $this->fetch(new GetHostClientFiltersRequest($query));
    }

    /**
     * Deletes the Host Record or records supplied, if they are not currently in use: POST /host/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyHostsRequest(['id' => $ids]));
    }

    /**
     * Sets the role for a list of Host Records: POST /host/set-role.
     *
     * @param  array<string, mixed>  $options  Query options: id, role
     */
    public function setRole(array $options = []): bool
    {
        return $this->perform(new SetHostRoleRequest($options));
    }

    /**
     * Enables the Host Record that matches the supplied DBID: POST /host/{id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): bool
    {
        return $this->perform(new EnableHostRequest($id, $options));
    }

    /**
     * Disables the Host Record that matches the supplied DBID: POST /host/{id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $id, array $options = []): bool
    {
        return $this->perform(new DisableHostRequest($id, $options));
    }

    /**
     * Imports hosts into database: POST /host/import-hosts.
     *
     * @param  array<string, mixed>  $options  Query options: file
     */
    public function importHosts(array $options = []): bool
    {
        return $this->perform(new ImportHostHostsRequest($options));
    }

    /**
     * Updates an existing Host Record in the database: POST /host/with-adapters/{id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function withAdaptersById(int $id, array $options = []): bool
    {
        return $this->perform(new PostHostWithAdaptersByIdRequest($id, $options));
    }

    /**
     * Sets the health status of the Host Record for the provided id: POST /host/{id}/set-health.
     *
     * @param  array<string, mixed>  $options  Query options: profileName, status, profileID
     */
    public function setHealth(int $id, array $options = []): bool
    {
        return $this->perform(new SetHostHealthRequest($id, $options));
    }

    /**
     * Deletes the Host Record or records supplied, if it is not currently in use: POST /host/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteHostViaPostRequest($id, $options));
    }

    /**
     * Sends a message to a list of Host Records via the Persistent Agent: POST /host/set-expiration.
     *
     * @param  array<string, mixed>  $options  Query options: id, setExpiration, setInactivity, expireDays, expireDateMS, InactiveDays
     */
    public function setExpiration(array $options = []): bool
    {
        return $this->perform(new SetHostExpirationRequest($options));
    }

    /**
     * Re-Scans a Host Record with a particular script profile: POST /host/{id}/rescan-with-profile.
     *
     * @param  array<string, mixed>  $options  Query options: profileID
     */
    public function rescanWithProfile(int $id, array $options = []): bool
    {
        return $this->perform(new RescanHostWithProfileRequest($id, $options));
    }

    /**
     * Sends a message to a list of Host Records via the Persistent Agent: POST /host/send-persistent-agent-message.
     *
     * @param  array<string, mixed>  $options  Query options: id, message, url, duration
     */
    public function sendPersistentAgentMessage(array $options = []): bool
    {
        return $this->perform(new SendHostPersistentAgentMessageRequest($options));
    }

    /**
     * Updates the Persistent Agent for the Host Record with the provided id: POST /host/{id}/update-persistent-agent.
     *
     * @param  array<string, mixed>  $options  Query options: uuid
     */
    public function updatePersistentAgent(int $id, array $options = []): bool
    {
        return $this->perform(new UpdateHostPersistentAgentRequest($id, $options));
    }

    /**
     * Returns the health history of the Host Record with the supplied DBID: GET /host/{id}/health-history.
     */
    public function healthHistory(int $id): ?HostHealthHistory
    {
        return $this->fetchOrNull(new GetHostHealthHistoryRequest($id));
    }

    /**
     * Returns all Host Records, with User and Adapter information, which match the supplied multifilter string: GET /host/multifilter.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, HostMultifilter>
     */
    public function multifilter(Query|array $query = []): Collection
    {
        return $this->fetch(new GetHostMultifilterRequest($query));
    }

    /**
     * Returns all Host Records, with User and Adapter information, which match the supplied multifilter string: GET /host/multifilter/users.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, HostMultifilter>
     */
    public function multifilterUsers(Query|array $query = []): Collection
    {
        return $this->fetch(new GetHostMultifilterUsersRequest($query));
    }

    /**
     * Return all Host Records, with User and Adapter information, which match the supplied multifilter string: GET /host/ncm-pods.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, HostNcmPod>
     */
    public function ncmPods(Query|array $query = []): Collection
    {
        return $this->fetch(new GetHostNcmPodsRequest($query));
    }

    /**
     * Returns all Host Records which match the supplied filter, searching Hosts, Users, and Adapters: GET /host/search.
     *
     * @param  array<string, mixed>  $options  Query options: filter, start, count, sortKey, sortDir
     */
    public function search(array $options = []): mixed
    {
        return $this->fetch(new GetHostSearchRequest($options));
    }

    /**
     * Disables the Host Record that matches the supplied ip address: POST /host/disable-by-ip.
     *
     * @param  array<string, mixed>  $options  Query options: ip
     */
    public function disableByIp(array $options = []): bool
    {
        return $this->perform(new DisableHostByIpRequest($options));
    }

    /**
     * Disables the Host Record that matches the supplied mac address: POST /host/disable-by-mac.
     *
     * @param  array<string, mixed>  $options  Query options: mac
     */
    public function disableByMac(array $options = []): bool
    {
        return $this->perform(new DisableHostByMacRequest($options));
    }

    /**
     * Enables the Host Record that matches the supplied ip address: POST /host/enable-by-ip.
     *
     * @param  array<string, mixed>  $options  Query options: ip
     */
    public function enableByIp(array $options = []): bool
    {
        return $this->perform(new EnableHostByIpRequest($options));
    }

    /**
     * Enables the Host Record that matches the supplied mac address: POST /host/enable-by-mac.
     *
     * @param  array<string, mixed>  $options  Query options: mac
     */
    public function enableByMac(array $options = []): bool
    {
        return $this->perform(new EnableHostByMacRequest($options));
    }

    /**
     * Registers the provided Host Record as device: POST /host/register-as-device.
     *
     * @param  array<string, mixed>  $options  Query options: id, role, devType, domainID, ip, regType
     */
    public function registerAsDevice(array $options = []): bool
    {
        return $this->perform(new RegisterHostAsDeviceRequest($options));
    }

    /**
     * Sets the logged on user for the Host Record that matches the supplied mac address: POST /host/set-logged-on-user.
     *
     * @param  array<string, mixed>  $options  Query options: mac, userID
     */
    public function setLoggedOnUser(array $options = []): bool
    {
        return $this->perform(new SetHostLoggedOnUserRequest($options));
    }

    /**
     * Adds a new Host Record to the database: POST /host/with-adapters.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function withAdapters(array|Data $attributes = [], array $options = []): ?Host
    {
        return $this->fetch(new PostHostWithAdaptersRequest($this->payloadOf($attributes), $options));
    }
}
