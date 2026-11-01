<?php

namespace spkm\FortiNac\Resources\Policy;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Policy\LogicalNetworkConfiguration;
use spkm\FortiNac\Data\Policy\LogicalNetworkConfigurationElementPropertiesByDeviceId;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\BatchLogicalNetworkConfigurationUpsertRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\CreateLogicalNetworkConfigurationRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\DeleteLogicalNetworkConfigurationRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\DeleteLogicalNetworkConfigurationViaPostRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\DeleteManyLogicalNetworkConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\GetLogicalNetworkConfigurationElementPropertiesRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\GetLogicalNetworkConfigurationRadiusRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\GetLogicalNetworkConfigurationRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\GetLogicalNetworkConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\GetLogicalNetworkConfigurationUsageRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\PostLogicalNetworkConfigurationElementPropertiesByDeviceIdRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\PostLogicalNetworkConfigurationElementPropertiesRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration\UpdateLogicalNetworkConfigurationRequest;

/**
 * Logical Network Configuration, from FortiNac::policy()->logicalNetworkConfigurations().
 *
 * @extends Builder<LogicalNetworkConfiguration>
 */
class LogicalNetworkConfigurationResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, LogicalNetworkConfiguration::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetLogicalNetworkConfigurationsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetLogicalNetworkConfigurationRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateLogicalNetworkConfigurationRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateLogicalNetworkConfigurationRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteLogicalNetworkConfigurationRequest((int) $id, $options);
    }

    /**
     * Returns all topology properties required to configure a device and the current configuration: GET /policy/logical-network-configuration/element/properties.
     *
     * @param  array<string, mixed>  $options  Query options: deviceID, readFromDevice
     */
    public function elementProperties(array $options = []): bool
    {
        return $this->perform(new GetLogicalNetworkConfigurationElementPropertiesRequest($options));
    }

    /**
     * Returns a list of records that reference this logical network record: GET /policy/logical-network-configuration/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetLogicalNetworkConfigurationUsageRequest($id));
    }

    /**
     * Returns a list of configured RADIUS servers and the current default primary and secondary: GET /policy/logical-network-configuration/radius.
     */
    public function radius(): mixed
    {
        return $this->fetch(new GetLogicalNetworkConfigurationRadiusRequest);
    }

    /**
     * Performs add or modify requests for a series of logical network configurations at once: POST /policy/logical-network-configuration/batch-upsert.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function batchUpsert(array|Data $attributes = [], array $options = []): ?LogicalNetworkConfiguration
    {
        return $this->fetch(new BatchLogicalNetworkConfigurationUpsertRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Sets attributes for a number of devices in one request: POST /policy/logical-network-configuration/element/properties.
     *
     * @param  array<string, mixed>  $options
     */
    public function elementProperties2(array $options = []): bool
    {
        return $this->perform(new PostLogicalNetworkConfigurationElementPropertiesRequest($options));
    }

    /**
     * Deletes a list of logical network records supplied under the id parameter: POST /policy/logical-network-configuration/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyLogicalNetworkConfigurationsRequest(['id' => $ids]));
    }

    /**
     * Deletes a single logical network record by ID: POST /policy/logical-network-configuration/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteLogicalNetworkConfigurationViaPostRequest($id, $options));
    }

    /**
     * Updates the topology properties on a single device: POST /policy/logical-network-configuration/element/properties/{deviceID}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function elementPropertiesByDeviceId(int $deviceId, array|Data $attributes = [], array $options = []): ?LogicalNetworkConfigurationElementPropertiesByDeviceId
    {
        return $this->fetch(new PostLogicalNetworkConfigurationElementPropertiesByDeviceIdRequest($deviceId, $this->payloadOf($attributes), $options));
    }
}
