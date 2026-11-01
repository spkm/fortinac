<?php

namespace spkm\FortiNac\Resources\Device;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Device\Port;
use spkm\FortiNac\Data\Device\PortByDevice;
use spkm\FortiNac\Data\Device\PortProperties;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\Device\Port\CountAllPortsRequest;
use spkm\FortiNac\Requests\Device\Port\CountPortsRequest;
use spkm\FortiNac\Requests\Device\Port\GetPortByDeviceRequest;
use spkm\FortiNac\Requests\Device\Port\GetPortEnforcementCountRequest;
use spkm\FortiNac\Requests\Device\Port\GetPortEnforcementRequest;
use spkm\FortiNac\Requests\Device\Port\GetPortFeaturePortManagementRequest;
use spkm\FortiNac\Requests\Device\Port\GetPortMonitorRequest;
use spkm\FortiNac\Requests\Device\Port\GetPortRequest;
use spkm\FortiNac\Requests\Device\Port\GetPortsRequest;
use spkm\FortiNac\Requests\Device\Port\PostPortPropertiesRequest;
use spkm\FortiNac\Requests\Device\Port\StartPortMonitorRequest;
use spkm\FortiNac\Requests\Device\Port\StopPortMonitorRequest;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Port, from FortiNac::device()->ports().
 *
 * @extends Builder<Port>
 */
class PortResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, Port::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetPortsRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountPortsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetPortRequest((int) $id);
    }

    /**
     * Returns a summary of all ports associated with the supplied network devices: GET /device/port/by-device.
     *
     * @param  array<string, mixed>  $options  Query options: devID, Request Body
     */
    public function findByDevice(array $options = []): ?PortByDevice
    {
        return $this->fetchOrNull(new GetPortByDeviceRequest($options));
    }

    /**
     * Returns the count of all Port records in the database: GET /device/port/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllPortsRequest);
    }

    /**
     * Lists the enforcement status of all ports which match the supplied set of filters: GET /device/port/enforcement.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, Port>
     */
    public function enforcement(Query|array $query = []): Collection
    {
        return $this->fetch(new GetPortEnforcementRequest($query));
    }

    /**
     * Lists the total number ports by enforcement status among those that match the supplied filters: GET /device/port/enforcement/count.
     */
    public function enforcementCount(): bool
    {
        return $this->perform(new GetPortEnforcementCountRequest);
    }

    /**
     * When modifying multiple ports at once, lists the number of devices that do and do not allow port management settings: GET /device/port/feature/port-management.
     *
     * @param  array<string, mixed>  $options  Query options: devID, Request Body
     */
    public function featurePortManagement(array $options = []): bool
    {
        return $this->perform(new GetPortFeaturePortManagementRequest($options));
    }

    /**
     * Gets all changes to Port records since they were last polled: GET /device/port/monitor/{id}.
     */
    public function monitor(int $id): bool
    {
        return $this->perform(new GetPortMonitorRequest($id));
    }

    /**
     * Stops collecting changes made of Port records matching the supplied filter: POST /device/port/monitor/{id}/stop.
     *
     * @param  array<string, mixed>  $options
     */
    public function stopMonitor(int $id, array $options = []): bool
    {
        return $this->perform(new StopPortMonitorRequest($id, $options));
    }

    /**
     * Begins collecting changes made of Port records matching the supplied filter: POST /device/port/monitor/start.
     *
     * @param  array<string, mixed>  $options
     * @return Collection<int, Port>
     */
    public function startMonitor(array $options = []): Collection
    {
        return $this->fetch(new StartPortMonitorRequest($options));
    }

    /**
     * Sets administration properties for the port or ports: POST /device/port/properties.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function properties(array|Data $attributes = [], array $options = []): ?PortProperties
    {
        return $this->fetch(new PostPortPropertiesRequest($this->payloadOf($attributes), $options));
    }
}
