<?php

namespace spkm\FortiNac\Resources\Logging;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Logging\ConnectionLogEntry;
use spkm\FortiNac\Data\Logging\ConnectionLogEntryTopHostsActivity;
use spkm\FortiNac\Data\Logging\ConnectionLogEntryTopUsersConnectedTime;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\CountAllConnectionLogEntriesRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\CountConnectionLogEntriesRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\GetConnectionLogEntriesRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\GetConnectionLogEntryArchiveImportStatusRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\GetConnectionLogEntryArchiveRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\GetConnectionLogEntryBySessionRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\GetConnectionLogEntryRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\GetConnectionLogEntryTabledatatotalsRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\GetConnectionLogEntryTopHostsActivityRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\GetConnectionLogEntryTopUsersConnectedTimeRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\GetConnectionLogEntryVlanChangesRequest;
use spkm\FortiNac\Requests\Logging\ConnectionLogEntry\PostConnectionLogEntryArchiveImportRequest;

/**
 * Connection Log, from FortiNac::logging()->connections().
 *
 * @extends Builder<ConnectionLogEntry>
 */
class ConnectionLogEntryResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, ConnectionLogEntry::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetConnectionLogEntriesRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountConnectionLogEntriesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetConnectionLogEntryRequest((int) $id);
    }

    /**
     * Returns the count of Network Session Event records in the database: GET /logging/connection/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllConnectionLogEntriesRequest);
    }

    /**
     * Returns the name of all connection log archives currently on the system: GET /logging/connection/archive.
     */
    public function archive(): mixed
    {
        return $this->fetch(new GetConnectionLogEntryArchiveRequest);
    }

    /**
     * Returns the status of the most recent connection log archive import: GET /logging/connection/archive/import/status.
     */
    public function archiveImportStatus(): mixed
    {
        return $this->fetch(new GetConnectionLogEntryArchiveImportStatusRequest);
    }

    /**
     * Returns all Network Session Event records which match the supplied filter, but only the first matching Network Session Event for each unique sessoin: GET /logging/connection/by-session.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, ConnectionLogEntry>
     */
    public function bySession(Query|array $query = []): Collection
    {
        return $this->fetch(new GetConnectionLogEntryBySessionRequest($query));
    }

    /**
     * Returns the Table Data Totals for Network Session Events: GET /logging/connection/tabledatatotals.
     *
     * @param  array<string, mixed>  $options  Query options: filter
     */
    public function tabledatatotals(array $options = []): bool
    {
        return $this->perform(new GetConnectionLogEntryTabledatatotalsRequest($options));
    }

    /**
     * Returns the top numbers of hosts by most connection activity: GET /logging/connection/top/hosts/activity.
     *
     * @param  array<string, mixed>  $options  Query options: filter
     */
    public function topHostsActivity(array $options = []): ?ConnectionLogEntryTopHostsActivity
    {
        return $this->fetchOrNull(new GetConnectionLogEntryTopHostsActivityRequest($options));
    }

    /**
     * Returns the top numbers of users by most connected time: GET /logging/connection/top/users/connected-time.
     *
     * @param  array<string, mixed>  $options  Query options: numUsers, filter
     */
    public function topUsersConnectedTime(array $options = []): ?ConnectionLogEntryTopUsersConnectedTime
    {
        return $this->fetchOrNull(new GetConnectionLogEntryTopUsersConnectedTimeRequest($options));
    }

    /**
     * Returns the number of unique Hosts that had access to each Logical Network: GET /logging/connection/vlan/changes.
     *
     * @param  array<string, mixed>  $options  Query options: filter
     */
    public function vlanChanges(array $options = []): bool
    {
        return $this->perform(new GetConnectionLogEntryVlanChangesRequest($options));
    }

    /**
     * Imports a collection log archive from the filesystem back into the database: POST /logging/connection/archive/import.
     *
     * @param  array<string, mixed>  $options  Query options: fileName
     */
    public function archiveImport(array $options = []): bool
    {
        return $this->perform(new PostConnectionLogEntryArchiveImportRequest($options));
    }
}
