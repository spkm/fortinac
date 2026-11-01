<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Settings\AccessPointManagement;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\Settings\AccessPointManagement\GetAccessPointManagementRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Access Point Management, from FortiNac::settings()->accessPointManagement().
 *
 * @extends BaseResource<AccessPointManagement>
 */
class AccessPointManagementResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, AccessPointManagement::class);
    }

    /**
     * Returns the currently configured Properties: GET /settings/device/access-point-management.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, AccessPointManagement>
     */
    public function get(Query|array $query = []): Collection
    {
        return $this->fetch(new GetAccessPointManagementRequest($query));
    }
}
