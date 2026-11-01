<?php

namespace spkm\FortiNac\Resources\Radius;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Radius\RadiusServer;
use spkm\FortiNac\Data\Radius\RadiusServerGlobal;
use spkm\FortiNac\Data\Radius\RadiusServerGlobalResult;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\CreateRadiusServerRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\DeleteManyRadiusServersRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\DeleteRadiusServerRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\DisableManyRadiusServersRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\EnableManyRadiusServersRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\GetRadiusServerActivityStatusRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\GetRadiusServerEapTypesRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\GetRadiusServerGlobalRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\GetRadiusServerLogRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\GetRadiusServerRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\GetRadiusServersRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\GetRadiusServerStatusRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\PostRadiusServerGlobalRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\PostRadiusServerNasFixstaleByIdRequest;
use spkm\FortiNac\Requests\Radius\RadiusServer\UpdateRadiusServerRequest;

/**
 * Radius Server Configuration, from FortiNac::radius()->servers().
 *
 * @extends Builder<RadiusServer>
 */
class RadiusServerResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, RadiusServer::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRadiusServersRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetRadiusServerRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateRadiusServerRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateRadiusServerRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteRadiusServerRequest((int) $id, $options);
    }

    /**
     * Returns true if RADIUS Activity Monitoring is enabled: GET /radius/radius-server-config/activityStatus.
     */
    public function activityStatus(): mixed
    {
        return $this->fetch(new GetRadiusServerActivityStatusRequest);
    }

    /**
     * Returns the list of EAP types that are supported by the Local RADIUS server: GET /radius/radius-server-config/eap-types.
     */
    public function eapTypes(): mixed
    {
        return $this->fetch(new GetRadiusServerEapTypesRequest);
    }

    /**
     * Retrieves the global configuration settings for the local RADIUS service: GET /radius/radius-server-config/global.
     */
    public function global(): ?RadiusServerGlobal
    {
        return $this->fetchOrNull(new GetRadiusServerGlobalRequest);
    }

    /**
     * Returns the current status for the RADIUS service: GET /radius/radius-server-config/status.
     */
    public function status(): bool
    {
        return $this->perform(new GetRadiusServerStatusRequest);
    }

    /**
     * Retrieves the RADIUS service log (var/log/radius/radius.log), systemd journal, and output master entries containing: GET /radius/radius-server-config/log.
     *
     * @param  array<string, mixed>  $options  Query options: lines
     */
    public function log(array $options = []): mixed
    {
        return $this->fetch(new GetRadiusServerLogRequest($options));
    }

    /**
     * Delete multiple RADIUS server configuration object by ID: POST /radius/radius-server-config/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyRadiusServersRequest(['id' => $ids]));
    }

    /**
     * Disables the RadiusServer service for the system: POST /radius/radius-server-config/disable.
     *
     * @param  list<int|string>  $ids
     */
    public function disableMany(array $ids): bool
    {
        return $this->perform(new DisableManyRadiusServersRequest(['id' => $ids]));
    }

    /**
     * Enables the RadiusServer service for the system: POST /radius/radius-server-config/enable.
     *
     * @param  list<int|string>  $ids
     */
    public function enableMany(array $ids): bool
    {
        return $this->perform(new EnableManyRadiusServersRequest(['id' => $ids]));
    }

    /**
     * Updates all NAS that are configured to use a RADIUS server configuration that no longer exists to use the specified cfg ID: POST /radius/radius-server-config/nas/fixstale/{id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function nasFixstaleById(int $id, array $options = []): ?RadiusServer
    {
        return $this->fetch(new PostRadiusServerNasFixstaleByIdRequest($id, $options));
    }

    /**
     * Set the global Local Radius config that applies to all LocalRadiusConfiguration instances, such as auth port: POST /radius/radius-server-config/global.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function global2(array|Data $attributes = [], array $options = []): ?RadiusServerGlobalResult
    {
        return $this->fetch(new PostRadiusServerGlobalRequest($this->payloadOf($attributes), $options));
    }
}
