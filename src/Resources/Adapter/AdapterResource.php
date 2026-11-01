<?php

namespace spkm\FortiNac\Resources\Adapter;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Adapter\Adapter;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\Adapter\Adapter\CountAdaptersRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\CountAllAdaptersRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\CreateAdapterRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\DeleteAdapterRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\DeleteAdapterViaPostRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\DeleteManyAdaptersRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\DisableAdapterRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\EnableAdapterRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\GetAdapterConnectedToPortsRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\GetAdapterForHostRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\GetAdapterGetPortRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\GetAdapterRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\GetAdaptersRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\GetAdapterUsageRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\ReprofileAdapterRoguesRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\RunAdapterNmapScanRequest;
use spkm\FortiNac\Requests\Adapter\Adapter\UpdateAdapterRequest;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Adapter Record, from FortiNac::adapters().
 *
 * @extends Builder<Adapter>
 */
class AdapterResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, Adapter::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAdaptersRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountAdaptersRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetAdapterRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateAdapterRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateAdapterRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteAdapterRequest($this->intId($id), $options);
    }

    /**
     * Returns the count of all Adapter records in the database: GET /adapter/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllAdaptersRequest);
    }

    /**
     * Returns a list of records that reference this Adapter record: GET /adapter/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetAdapterUsageRequest($id));
    }

    /**
     * Returns a list of adapters connected to the ports provided: GET /adapter/connected-to-ports.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, Adapter>
     */
    public function connectedToPorts(Query|array $query = []): Collection
    {
        return $this->fetch(new GetAdapterConnectedToPortsRequest($query));
    }

    /**
     * Returns a list of adapters for the host object with the provided id: GET /adapter/for-host.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, Adapter>
     */
    public function forHost(Query|array $query = []): Collection
    {
        return $this->fetch(new GetAdapterForHostRequest($query));
    }

    /**
     * Returns the port ID that the adapter was most recently connected to. Request Parameter Id(required), DBID of the adapter record: GET /adapter/{id}/get-port.
     */
    public function getPort(int $id): mixed
    {
        return $this->fetch(new GetAdapterGetPortRequest($id));
    }

    /**
     * Deletes the Adapter records or the records supplied, if they are not currently in use: POST /adapter/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyAdaptersRequest(['id' => $ids]));
    }

    /**
     * Deletes the Adapter record supplied, if it is not currently in use: POST /adapter/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteAdapterViaPostRequest($id, $options));
    }

    /**
     * Reprofile the rogue devices with the supplied mac addresses: POST /adapter/reprofile-rogues.
     *
     * @param  array<string, mixed>  $options  Query options: mac
     */
    public function reprofileRogues(array $options = []): bool
    {
        return $this->perform(new ReprofileAdapterRoguesRequest($options));
    }

    /**
     * Enables the Adapter that matches the supplied DBID: POST /adapter/{id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): bool
    {
        return $this->perform(new EnableAdapterRequest($id, $options));
    }

    /**
     * Disables the Adapter that matches the supplied DBID: POST /adapter/{id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $id, array $options = []): bool
    {
        return $this->perform(new DisableAdapterRequest($id, $options));
    }

    /**
     * Run an NMAP scan for the adapter by the IP address provided: POST /adapter/run-nmap-scan.
     *
     * @param  array<string, mixed>  $options  Query options: ip-address
     */
    public function runNmapScan(array $options = []): bool
    {
        return $this->perform(new RunAdapterNmapScanRequest($options));
    }
}
