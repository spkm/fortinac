<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Settings\OsUpdate;
use spkm\FortiNac\Data\Settings\OsUpdateLogs;
use spkm\FortiNac\Data\Settings\OsUpdateUpdateData;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\Settings\OsUpdate\GetOsUpdateLogsRequest;
use spkm\FortiNac\Requests\Settings\OsUpdate\GetOsUpdatesRequest;
use spkm\FortiNac\Requests\Settings\OsUpdate\GetOsUpdateUpdateDataRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * OS Update, from FortiNac::settings()->osUpdates().
 *
 * @extends BaseResource<OsUpdate>
 */
class OsUpdateResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, OsUpdate::class);
    }

    /**
     * Returns the OS Update Servers: GET /settings/udpates/os-updates.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, OsUpdate>
     */
    public function get(Query|array $query = []): Collection
    {
        return $this->fetch(new GetOsUpdatesRequest($query));
    }

    /**
     * Returns the OS Update Servers logs: GET /settings/udpates/os-updates/logs.
     */
    public function logs(): ?OsUpdateLogs
    {
        return $this->fetchOrNull(new GetOsUpdateLogsRequest);
    }

    /**
     * Returns the OS Update data: GET /settings/udpates/os-updates/update-data.
     */
    public function updateData(): ?OsUpdateUpdateData
    {
        return $this->fetchOrNull(new GetOsUpdateUpdateDataRequest);
    }
}
