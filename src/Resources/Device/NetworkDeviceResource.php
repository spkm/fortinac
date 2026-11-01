<?php

namespace spkm\FortiNac\Resources\Device;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Device\NetworkDevice;
use spkm\FortiNac\Data\Device\NetworkDevicePingableById;
use spkm\FortiNac\Data\Device\NetworkDeviceProperties;
use spkm\FortiNac\Data\Device\NetworkDeviceSnmp;
use spkm\FortiNac\Data\Device\NetworkDeviceSnmpById;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\Device\NetworkDevice\CountAllNetworkDevicesRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\CountNetworkDevicesRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\DeleteManyNetworkDevicesRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\DeleteNetworkDeviceRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\DeleteNetworkDeviceViaPostRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\GetNetworkDeviceMonitorRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\GetNetworkDeviceMoveRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\GetNetworkDevicePollingL3Request;
use spkm\FortiNac\Requests\Device\NetworkDevice\GetNetworkDevicePropertiesRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\GetNetworkDeviceRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\GetNetworkDevicesRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\GetNetworkDeviceUsageRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\PostNetworkDevicePingableByIdRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\PostNetworkDevicePingableRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\PostNetworkDevicePropertiesRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\PostNetworkDeviceSnmpByIdRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\PostNetworkDeviceSnmpRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\ResyncNetworkDeviceInterfacesRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\StartNetworkDeviceMonitorRequest;
use spkm\FortiNac\Requests\Device\NetworkDevice\StopNetworkDeviceMonitorRequest;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Network Device, from FortiNac::device().
 *
 * @extends Builder<NetworkDevice>
 */
class NetworkDeviceResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, NetworkDevice::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetNetworkDevicesRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountNetworkDevicesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetNetworkDeviceRequest((int) $id);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteNetworkDeviceRequest((int) $id, $options);
    }

    /**
     * Gets all changes to Network Device records since the Events were last polled: GET /device/monitor/{id}.
     */
    public function monitor(int $id): bool
    {
        return $this->perform(new GetNetworkDeviceMonitorRequest($id));
    }

    /**
     * Returns the count of all Network Device records in the database: GET /device/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllNetworkDevicesRequest);
    }

    /**
     * Returns a list of Network Device records that reference this record: GET /device/{id}/usage.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetNetworkDeviceUsageRequest($id, $query));
    }

    /**
     * Sets the L3 polling properties for the supplied devices: GET /device/polling/l3.
     *
     * @param  array<string, mixed>  $options  Query options: enabled, createRogues, frequencySeconds, priority, id
     */
    public function pollingL3(array $options = []): mixed
    {
        return $this->fetch(new GetNetworkDevicePollingL3Request($options));
    }

    /**
     * Moves an existing Network Device from one container to other: GET /device/move.
     *
     * @param  array<string, mixed>  $options  Query options: isHost, containerID, deviceID
     */
    public function move(array $options = []): mixed
    {
        return $this->fetch(new GetNetworkDeviceMoveRequest($options));
    }

    /**
     * Returns the currently configured network device settings: GET /device/properties.
     */
    public function properties(): ?NetworkDeviceProperties
    {
        return $this->fetchOrNull(new GetNetworkDevicePropertiesRequest);
    }

    /**
     * Deletes the Network Device record or records supplied, if they are not currently in use: POST /device/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyNetworkDevicesRequest(['id' => $ids]));
    }

    /**
     * Deletes the Network Device record or records supplied, if it is not currently in use: POST /device/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteNetworkDeviceViaPostRequest($id, $options));
    }

    /**
     * Stops collecting changes made to Network Device records for the specified monitor: POST /device/monitor/{id}/stop.
     *
     * @param  array<string, mixed>  $options
     */
    public function stopMonitor(int $id, array $options = []): bool
    {
        return $this->perform(new StopNetworkDeviceMonitorRequest($id, $options));
    }

    /**
     * Begins collecting changes made to Network Device records matching the supplied filter: POST /device/monitor/start.
     *
     * @param  array<string, mixed>  $options
     * @return Collection<int, NetworkDevice>
     */
    public function startMonitor(array $options = []): Collection
    {
        return $this->fetch(new StartNetworkDeviceMonitorRequest($options));
    }

    /**
     * Updates an existing pingable device in the database: POST /device/pingable/{id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function pingableById(int $id, array|Data $attributes = [], array $options = []): ?NetworkDevicePingableById
    {
        return $this->fetch(new PostNetworkDevicePingableByIdRequest($id, $this->payloadOf($attributes), $options));
    }

    /**
     * Adds a new pingable device to the database: POST /device/pingable.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function pingable(array|Data $attributes = [], array $options = []): ?NetworkDevicePingableById
    {
        return $this->fetch(new PostNetworkDevicePingableRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Sets the properties for a Network Device: POST /device/properties.
     *
     * @param  array<string, mixed>  $options  Query options: agentDelay, agentDelayStr, cdpMaxHopsStr, ciscoDiscovery, ciscoDiscoveryMaxHops, ciscoDiscoveryStr, coldWarmTrapDelay, coldWarmTrapDelayStr, getmaxTrapPeriods, ignoreMacNotifyOnPhone, ignoreMacNotifyOnPhoneStr, lldpDiscovery, lldpDiscoveryStr, macSpoofDelay, macSpoofDelayStr, maxTrapPeriodsStr, meAccessPolicy, minTrapPeriod, minTrapPeriodStr, multiAccess, multiAccessStr, multiAccessThreshold, preservePortNames, preservePortNamesStr, regDelay, regDelayStr, telnetTimeout, telnetTimeoutStr, uplinkCount, uplinkCountStr, vlanResetDelay, vlanResetDelayStr, vlanSwitchingDelay, vlanSwitchingDelayStr
     */
    public function properties2(array $options = []): ?NetworkDeviceProperties
    {
        return $this->fetch(new PostNetworkDevicePropertiesRequest($options));
    }

    /**
     * Adds a new SNMP device to the database: POST /device/snmp.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function snmp(array|Data $attributes = [], array $options = []): ?NetworkDeviceSnmp
    {
        return $this->fetch(new PostNetworkDeviceSnmpRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Updates an existing SNMP device in the database: POST /device/snmp/{id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function snmpById(int $id, array|Data $attributes = [], array $options = []): ?NetworkDeviceSnmpById
    {
        return $this->fetch(new PostNetworkDeviceSnmpByIdRequest($id, $this->payloadOf($attributes), $options));
    }

    /**
     * Resync Interfaces for the supplied devices. Note: This REST API is introduced in v7.2.6: POST /device/resync-interfaces.
     *
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function resyncInterfaces(array $options = []): bool
    {
        return $this->perform(new ResyncNetworkDeviceInterfacesRequest($options));
    }
}
