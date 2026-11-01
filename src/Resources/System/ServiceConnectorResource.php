<?php

namespace spkm\FortiNac\Resources\System;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\System\ServiceConnector;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\System\ServiceConnector\GetServiceConnectorsRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Service Connector, from FortiNac::system()->serviceConnector().
 *
 * @extends BaseResource<ServiceConnector>
 */
class ServiceConnectorResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, ServiceConnector::class);
    }

    /**
     * Returns a summary of all configured Service Connectors: GET /system/service-connector.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, ServiceConnector>
     */
    public function get(Query|array $query = []): Collection
    {
        return $this->fetch(new GetServiceConnectorsRequest($query));
    }
}
