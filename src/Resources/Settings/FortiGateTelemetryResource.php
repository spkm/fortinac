<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Settings\FortiGateTelemetry;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Settings\FortiGateTelemetry\CreateFortiGateTelemetryRequest;
use spkm\FortiNac\Requests\Settings\FortiGateTelemetry\DeleteFortiGateTelemetryRequest;
use spkm\FortiNac\Requests\Settings\FortiGateTelemetry\DeleteFortiGateTelemetryViaPostRequest;
use spkm\FortiNac\Requests\Settings\FortiGateTelemetry\DeleteManyFortiGateTelemetriesRequest;
use spkm\FortiNac\Requests\Settings\FortiGateTelemetry\GetFortiGateTelemetriesRequest;
use spkm\FortiNac\Requests\Settings\FortiGateTelemetry\GetFortiGateTelemetryRequest;
use spkm\FortiNac\Requests\Settings\FortiGateTelemetry\GetFortiGateTelemetryUsageRequest;
use spkm\FortiNac\Requests\Settings\FortiGateTelemetry\UpdateFortiGateTelemetryRequest;

/**
 * FortiGate Telemetry, from FortiNac::settings()->fortiGateTelemetry().
 *
 * @extends Builder<FortiGateTelemetry>
 */
class FortiGateTelemetryResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, FortiGateTelemetry::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetFortiGateTelemetriesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetFortiGateTelemetryRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateFortiGateTelemetryRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateFortiGateTelemetryRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteFortiGateTelemetryRequest($this->intId($id), $options);
    }

    /**
     * Returns a list of records that reference this Security Fabric Connection source: GET /settings/security-fabric/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetFortiGateTelemetryUsageRequest($id));
    }

    /**
     * Deletes a list of Security Fabric Connection sources supplied under the id parameter: POST /settings/security-fabric/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyFortiGateTelemetriesRequest(['id' => $ids]));
    }

    /**
     * Deletes a single Security Fabric Connection source by ID: POST /settings/security-fabric/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteFortiGateTelemetryViaPostRequest($id, $options));
    }
}
