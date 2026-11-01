<?php

namespace spkm\FortiNac\Resources\Policy;

use spkm\FortiNac\Data\Policy\EndpointCompliancePolicy;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\CreateEndpointCompliancePolicyRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\DeleteEndpointCompliancePolicyRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\DeleteEndpointCompliancePolicyViaPostRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\DeleteManyEndpointCompliancePoliciesRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\DisableEndpointCompliancePolicyRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\DisableManyEndpointCompliancePoliciesRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\EnableEndpointCompliancePolicyRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\EnableManyEndpointCompliancePoliciesRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\GetEndpointCompliancePoliciesRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\GetEndpointCompliancePolicyRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\GetEndpointCompliancePolicySupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\SetEndpointCompliancePolicyRankRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\SwapEndpointCompliancePolicyRanksRequest;
use spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy\UpdateEndpointCompliancePolicyRequest;

/**
 * Endpoint Compliance Policy, from FortiNac::policy()->endpointCompliancePolicies().
 *
 * @extends Builder<EndpointCompliancePolicy>
 */
class EndpointCompliancePolicyResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, EndpointCompliancePolicy::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetEndpointCompliancePoliciesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetEndpointCompliancePolicyRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateEndpointCompliancePolicyRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateEndpointCompliancePolicyRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteEndpointCompliancePolicyRequest((int) $id, $options);
    }

    /**
     * Returns the information used to create an Endpoint Compliance Policy: GET /policy/endpoint-compliance/supporting-info.
     */
    public function supportingInfo(): bool
    {
        return $this->perform(new GetEndpointCompliancePolicySupportingInfoRequest);
    }

    /**
     * Deletes a list of Endpoint Compliance Policy records supplied under the id parameter: POST /policy/endpoint-compliance/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyEndpointCompliancePoliciesRequest(['id' => $ids]));
    }

    /**
     * Disables the supplied Endpoint Compliance Policy: POST /policy/endpoint-compliance/disable.
     *
     * @param  list<int|string>  $ids
     */
    public function disableMany(array $ids): bool
    {
        return $this->perform(new DisableManyEndpointCompliancePoliciesRequest(['id' => $ids]));
    }

    /**
     * Enables the supplied Endpoint Compliance Policy: POST /policy/endpoint-compliance/enable.
     *
     * @param  list<int|string>  $ids
     */
    public function enableMany(array $ids): bool
    {
        return $this->perform(new EnableManyEndpointCompliancePoliciesRequest(['id' => $ids]));
    }

    /**
     * Deletes a single Endpoint Compliance Policy record by ID: POST /policy/endpoint-compliance/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteEndpointCompliancePolicyViaPostRequest($id, $options));
    }

    /**
     * Disables the supplied Endpoint Compliance Policy: POST /policy/endpoint-compliance/{id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $id, array $options = []): bool
    {
        return $this->perform(new DisableEndpointCompliancePolicyRequest($id, $options));
    }

    /**
     * Enables the supplied Endpoint Compliance Policy: POST /policy/endpoint-compliance/{id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): bool
    {
        return $this->perform(new EnableEndpointCompliancePolicyRequest($id, $options));
    }

    /**
     * Sets the rank of the supplied Endpoint Compliance Policy, shifting other ranks as necessary: POST /policy/endpoint-compliance/rank/set.
     *
     * @param  array<string, mixed>  $options  Query options: id, rank
     */
    public function setRank(array $options = []): bool
    {
        return $this->perform(new SetEndpointCompliancePolicyRankRequest($options));
    }

    /**
     * Swaps the rank position of the two supplied Endpoint Compliance Policies: POST /policy/endpoint-compliance/rank/swap.
     *
     * @param  array<string, mixed>  $options  Query options: id1, id2
     */
    public function swapRanks(array $options = []): bool
    {
        return $this->perform(new SwapEndpointCompliancePolicyRanksRequest($options));
    }
}
