<?php

namespace spkm\FortiNac\Resources\System;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\System\ManagedServerLicense;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\System\ManagedServer\CreateManagedServerRequest;
use spkm\FortiNac\Requests\System\ManagedServer\DeleteManyManagedServersRequest;
use spkm\FortiNac\Requests\System\ManagedServer\GetManagedServerHardwareRequest;
use spkm\FortiNac\Requests\System\ManagedServer\GetManagedServerLicenseRequest;
use spkm\FortiNac\Requests\System\ManagedServer\GetManagedServerPropertiesRequest;
use spkm\FortiNac\Requests\System\ManagedServer\GetManagedServerScansRequest;
use spkm\FortiNac\Requests\System\ManagedServer\GetManagedServerSummaryRequest;
use spkm\FortiNac\Requests\System\ManagedServer\PingManagedServerRequest;
use spkm\FortiNac\Requests\System\ManagedServer\PostManagedServerPropertiesRequest;
use spkm\FortiNac\Requests\System\ManagedServer\SyncManagedServerRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Server Management, from FortiNac::system()->managedServers().
 *
 * @extends BaseResource<Data>
 */
class ManagedServerResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Returns the current license information for this server and all managed server: GET /system/properties/license.
     */
    public function license(): ?ManagedServerLicense
    {
        return $this->fetchOrNull(new GetManagedServerLicenseRequest);
    }

    /**
     * Queries hardware status and performance informaiton: GET /system/properties/hardware.
     */
    public function hardware(): bool
    {
        return $this->perform(new GetManagedServerHardwareRequest);
    }

    /**
     * Returns additional properties about a server that have been set in the manager: GET /system/managed-server/{id}/properties.
     */
    public function properties(int $id): mixed
    {
        return $this->fetch(new GetManagedServerPropertiesRequest($id));
    }

    /**
     * Returns the cluster information for all managed servers, listing Control/Application pairs and High Availability servers: GET /system/managed-server/summary.
     */
    public function summary(): bool
    {
        return $this->perform(new GetManagedServerSummaryRequest);
    }

    /**
     * Returns all scan configurations available on the requested managed server: GET /system/managed-server/{id}/scans.
     */
    public function scans(int $id): mixed
    {
        return $this->fetch(new GetManagedServerScansRequest($id));
    }

    /**
     * Adds a new server to be managed by this server. Managed servers will receive configuration from this server: POST /system/managed-server.
     *
     * @param  array<string, mixed>  $options  Query options: ip
     */
    public function create(array $options = []): bool
    {
        return $this->perform(new CreateManagedServerRequest($options));
    }

    /**
     * Removes a server from management. The server will no longer receive configuration changes and will be able to manage all locally defined configurations: POST /system/managed-server/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyManagedServersRequest(['id' => $ids]));
    }

    /**
     * Sets additional properties about a server in the manager: POST /system/managed-server/{id}/properties.
     *
     * @param  array<string, mixed>  $options  Query options: ip
     */
    public function properties2(int $id, array $options = []): bool
    {
        return $this->perform(new PostManagedServerPropertiesRequest($id, $options));
    }

    /**
     * Synchronizes data from the management server to the managed server: POST /system/managed-server/sync.
     *
     * @param  array<string, mixed>  $options  Query options: serverIP
     */
    public function sync(array $options = []): bool
    {
        return $this->perform(new SyncManagedServerRequest($options));
    }

    /**
     * Get server data from a POD managed server from the management server: POST /system/managed-server/ping.
     *
     * @param  array<string, mixed>  $options  Query options: address
     */
    public function ping(array $options = []): bool
    {
        return $this->perform(new PingManagedServerRequest($options));
    }
}
