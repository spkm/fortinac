<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Settings\PaPacketTransportConfig;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\CreatePaPacketTransportConfigRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\DeleteManyPaPacketTransportConfigsRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\DeletePaPacketTransportConfigRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\DeletePaPacketTransportConfigViaPostRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\DeployPaPacketTransportConfigRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\GetPaPacketTransportConfigPerformanceRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\GetPaPacketTransportConfigRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\GetPaPacketTransportConfigsRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\GetPaPacketTransportConfigUsageRequest;
use spkm\FortiNac\Requests\Settings\PaPacketTransportConfig\UpdatePaPacketTransportConfigRequest;

/**
 * PA Packet Transport Config, from FortiNac::settings()->paPacketTransportConfigs().
 *
 * @extends Builder<PaPacketTransportConfig>
 */
class PaPacketTransportConfigResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, PaPacketTransportConfig::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetPaPacketTransportConfigsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetPaPacketTransportConfigRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreatePaPacketTransportConfigRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdatePaPacketTransportConfigRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeletePaPacketTransportConfigRequest($this->intId($id), $options);
    }

    /**
     * Returns a list of Persistent Agent Transport records that reference this record: GET /settings/agent/pa-packet-transport-config/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetPaPacketTransportConfigUsageRequest($id));
    }

    /**
     * Reinitialize Persistent Agent Transports from the configurations in the database: GET /settings/agent/pa-packet-transport-config/performance.
     */
    public function performance(): mixed
    {
        return $this->fetch(new GetPaPacketTransportConfigPerformanceRequest);
    }

    /**
     * Deletes a list of Persistent Agent Transport records supplied under the id parameter: POST /settings/agent/pa-packet-transport-config/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyPaPacketTransportConfigsRequest(['id' => $ids]));
    }

    /**
     * Deletes a single Persistent Agent Transport record by ID: POST /settings/agent/pa-packet-transport-config/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeletePaPacketTransportConfigViaPostRequest($id, $options));
    }

    /**
     * Reinitialize Persistent Agent Transports from the configurations in the database: POST /settings/agent/pa-packet-transport-config/deploy.
     *
     * @param  array<string, mixed>  $options
     */
    public function deploy(array $options = []): bool
    {
        return $this->perform(new DeployPaPacketTransportConfigRequest($options));
    }
}
