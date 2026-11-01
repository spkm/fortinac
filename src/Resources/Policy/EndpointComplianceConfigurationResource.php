<?php

namespace spkm\FortiNac\Resources\Policy;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Policy\EndpointComplianceConfiguration;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration\CreateEndpointComplianceConfigurationRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration\DeleteEndpointComplianceConfigurationRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration\DeleteEndpointComplianceConfigurationViaPostRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration\DeleteManyEndpointComplianceConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration\GetEndpointComplianceConfigurationRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration\GetEndpointComplianceConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration\GetEndpointComplianceConfigurationSupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration\GetEndpointComplianceConfigurationUsageRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration\UpdateEndpointComplianceConfigurationRequest;

/**
 * Endpoint Compliance Configuration, from FortiNac::policy()->endpointComplianceConfigurations().
 *
 * @extends Builder<EndpointComplianceConfiguration>
 */
class EndpointComplianceConfigurationResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, EndpointComplianceConfiguration::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetEndpointComplianceConfigurationsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetEndpointComplianceConfigurationRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateEndpointComplianceConfigurationRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateEndpointComplianceConfigurationRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteEndpointComplianceConfigurationRequest($this->intId($id), $options);
    }

    /**
     * Returns a list of records that reference this Endpoint Compliance Configuration record: GET /policy/endpoint-compliance-configuration/{id}/usage.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetEndpointComplianceConfigurationUsageRequest($id, $query));
    }

    /**
     * Returns the information used to create an Endpoint Compliance Configuration: GET /policy/endpoint-compliance-configuration/supporting-info.
     */
    public function supportingInfo(): mixed
    {
        return $this->fetch(new GetEndpointComplianceConfigurationSupportingInfoRequest);
    }

    /**
     * Deletes a list of Endpoint Compliance Configuration records supplied under the id parameter: POST /policy/endpoint-compliance-configuration/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyEndpointComplianceConfigurationsRequest(['id' => $ids]));
    }

    /**
     * Deletes a single Endpoint Compliance Configuration record by ID: POST /policy/endpoint-compliance-configuration/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteEndpointComplianceConfigurationViaPostRequest($id, $options));
    }
}
