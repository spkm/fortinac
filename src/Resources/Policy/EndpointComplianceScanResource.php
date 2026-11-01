<?php

namespace spkm\FortiNac\Resources\Policy;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Policy\EndpointComplianceScan;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\CopyEndpointComplianceScanRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\CountAllEndpointComplianceScansRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\CountEndpointComplianceScansRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\CreateEndpointComplianceScanRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\DeleteEndpointComplianceScanRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\DeleteEndpointComplianceScanViaPostRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\DeleteManyEndpointComplianceScansRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\GetEndpointComplianceScanAvailableRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\GetEndpointComplianceScanDetailsRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\GetEndpointComplianceScanProductRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\GetEndpointComplianceScanRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\GetEndpointComplianceScansRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\GetEndpointComplianceScanUsageRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\PostEndpointComplianceScanDetails2Request;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\PostEndpointComplianceScanDetailsRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\RemoveEndpointComplianceScanPolicyTypesRequest;
use spkm\FortiNac\Requests\Policy\EndpointComplianceScan\UpdateEndpointComplianceScanRequest;

/**
 * Endpoint Compliance Scan, from FortiNac::policy()->endpointComplianceScans().
 *
 * @extends Builder<EndpointComplianceScan>
 */
class EndpointComplianceScanResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, EndpointComplianceScan::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetEndpointComplianceScansRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountEndpointComplianceScansRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetEndpointComplianceScanRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateEndpointComplianceScanRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateEndpointComplianceScanRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteEndpointComplianceScanRequest($this->intId($id), $options);
    }

    /**
     * Returns the full set of tests and custom scans available for each operating system: GET /policy/endpoint-compliance/scan/available.
     */
    public function available(): mixed
    {
        return $this->fetch(new GetEndpointComplianceScanAvailableRequest);
    }

    /**
     * Returns the count of all Scan Results in the database: GET /policy/endpoint-compliance/scan/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllEndpointComplianceScansRequest);
    }

    /**
     * Returns the selected tests and monitors for the Endpoint Compliance Scan: GET /policy/endpoint-compliance/scan/details.
     *
     * @param  array<string, mixed>  $options  Query options: policyName
     */
    public function details(array $options = []): mixed
    {
        return $this->fetch(new GetEndpointComplianceScanDetailsRequest($options));
    }

    /**
     * Returns a list of records that reference this Endpoint Compliance Scan by ID: GET /policy/endpoint-compliance/scan/{id}/usage.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetEndpointComplianceScanUsageRequest($id, $query));
    }

    /**
     * Returns the details used to display and edit a product within the policy. Each product supplies its own markup and scripts that may be used to create a valid configuration: GET /policy/endpoint-compliance/scan/product.
     *
     * @param  array<string, mixed>  $options  Query options: policyName, productName, osName, familyName
     */
    public function product(array $options = []): mixed
    {
        return $this->fetch(new GetEndpointComplianceScanProductRequest($options));
    }

    /**
     * Sets the selected tests and monitors for the Endpoint Compliance Scan: POST /policy/endpoint-compliance/scan/{id}/details.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function details2(int $id, array|Data $attributes = [], array $options = []): bool
    {
        return $this->perform(new PostEndpointComplianceScanDetailsRequest($id, $this->payloadOf($attributes), $options));
    }

    /**
     * Removes endpoint compliance policy objects for the supplied policy name: POST /policy/endpoint-compliance/scan/remove-policy-types.
     *
     * @param  array<string, mixed>  $options
     */
    public function removePolicyTypes(array $options = []): bool
    {
        return $this->perform(new RemoveEndpointComplianceScanPolicyTypesRequest($options));
    }

    /**
     * Copies all content from the supplied Scan to a new Scan: POST /policy/endpoint-compliance/scan/copy.
     *
     * @param  array<string, mixed>  $options  Query options: policyName, newPolicyName
     */
    public function copy(array $options = []): bool
    {
        return $this->perform(new CopyEndpointComplianceScanRequest($options));
    }

    /**
     * Deletes a list of Endpoint Compliance Scans supplied under the ID parameter, if they are not currently in use: POST /policy/endpoint-compliance/scan/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyEndpointComplianceScansRequest(['id' => $ids]));
    }

    /**
     * Sets the selected tests and monitors for the Endpoint Compliance Scan: POST /policy/endpoint-compliance/scan/details.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function details22(array|Data $attributes = [], array $options = []): bool
    {
        return $this->perform(new PostEndpointComplianceScanDetails2Request($this->payloadOf($attributes), $options));
    }

    /**
     * Deletes a single Endpoint Compliance Scan by ID, if it is not currently in use: POST /policy/endpoint-compliance/scan/{id}/delete.
     *
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteEndpointComplianceScanViaPostRequest($id, $options));
    }
}
