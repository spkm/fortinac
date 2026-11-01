<?php

namespace spkm\FortiNac\Resources\Device;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Device\Container;
use spkm\FortiNac\Data\Device\ContainerStartContainerMonitor;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\Device\Container\CountAllContainersRequest;
use spkm\FortiNac\Requests\Device\Container\CountContainersRequest;
use spkm\FortiNac\Requests\Device\Container\CreateContainerRequest;
use spkm\FortiNac\Requests\Device\Container\DeleteContainerRequest;
use spkm\FortiNac\Requests\Device\Container\DeleteContainerViaPostRequest;
use spkm\FortiNac\Requests\Device\Container\DeleteManyContainersRequest;
use spkm\FortiNac\Requests\Device\Container\GetContainerMonitorRequest;
use spkm\FortiNac\Requests\Device\Container\GetContainerRequest;
use spkm\FortiNac\Requests\Device\Container\GetContainersRequest;
use spkm\FortiNac\Requests\Device\Container\GetContainerUsageRequest;
use spkm\FortiNac\Requests\Device\Container\StartContainerMonitorRequest;
use spkm\FortiNac\Requests\Device\Container\StopContainerMonitorRequest;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Container, from FortiNac::device()->containers().
 *
 * @extends Builder<Container>
 */
class ContainerResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, Container::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetContainersRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountContainersRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetContainerRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateContainerRequest($body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteContainerRequest((int) $id, $options);
    }

    /**
     * Returns the count of Container records in the database: GET /device/container/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllContainersRequest);
    }

    /**
     * Returns a list of Container records that reference this record: GET /device/container/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetContainerUsageRequest($id));
    }

    /**
     * Get all changes to Container records since the Events were last polled: GET /device/container/monitor/{id}.
     */
    public function monitor(int $id): bool
    {
        return $this->perform(new GetContainerMonitorRequest($id));
    }

    /**
     * Deletes the Container record supplied, if they are not currently in use: POST /device/container/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyContainersRequest(['id' => $ids]));
    }

    /**
     * Deletes the Container record supplied, if it is not currently in use: POST /device/container/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteContainerViaPostRequest($id, $options));
    }

    /**
     * Begins collecting changes made to Container records matching the supplied filter: POST /device/container/monitor/start.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     * @return Collection<int, ContainerStartContainerMonitor>
     */
    public function startMonitor(array|Data $attributes = [], array $options = []): Collection
    {
        return $this->fetch(new StartContainerMonitorRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Stop collecting changes made to Container records for the specified monitor: POST /device/container/monitor/{id}/stop.
     *
     * @param  array<string, mixed>  $options
     */
    public function stopMonitor(int $id, array $options = []): bool
    {
        return $this->perform(new StopContainerMonitorRequest($id, $options));
    }
}
