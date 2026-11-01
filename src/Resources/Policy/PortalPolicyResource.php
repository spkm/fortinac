<?php

namespace spkm\FortiNac\Resources\Policy;

use spkm\FortiNac\Data\Policy\PortalPolicy;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\CreatePortalPolicyRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\DeleteManyPortalPoliciesRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\DeletePortalPolicyViaPostRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\DisableManyPortalPoliciesRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\EnableManyPortalPoliciesRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\GetPortalPoliciesRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\GetPortalPolicyRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\GetPortalPolicySupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\SetPortalPolicyRankRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\SwapPortalPolicyRanksRequest;
use spkm\FortiNac\Requests\Policy\PortalPolicy\UpdatePortalPolicyRequest;

/**
 * Portal Policy, from FortiNac::policy()->portalPolicies().
 *
 * @extends Builder<PortalPolicy>
 */
class PortalPolicyResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, PortalPolicy::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetPortalPoliciesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetPortalPolicyRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreatePortalPolicyRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdatePortalPolicyRequest($this->intId($id), $body, $options);
    }

    /**
     * Returns the information used to create portal policies: GET /policy/portal/supporting-info.
     */
    public function supportingInfo(): mixed
    {
        return $this->fetch(new GetPortalPolicySupportingInfoRequest);
    }

    /**
     * Deletes a list of portal policy records supplied under the id parameter: POST /policy/portal/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyPortalPoliciesRequest(['id' => $ids]));
    }

    /**
     * Disables the supplied Portal Policy: POST /policy/portal/disable.
     *
     * @param  list<int|string>  $ids
     */
    public function disableMany(array $ids): bool
    {
        return $this->perform(new DisableManyPortalPoliciesRequest(['id' => $ids]));
    }

    /**
     * Enables a list of portal policy records supplied under the id parameter: POST /policy/portal/enable.
     *
     * @param  list<int|string>  $ids
     */
    public function enableMany(array $ids): bool
    {
        return $this->perform(new EnableManyPortalPoliciesRequest(['id' => $ids]));
    }

    /**
     * Deletes a single portal policy record by ID: POST /policy/portal/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeletePortalPolicyViaPostRequest($id, $options));
    }

    /**
     * Sets the rank of the supplied portal policy, shifting other ranks as necessary: POST /policy/portal/rank/set.
     *
     * @param  array<string, mixed>  $options  Query options: id, rank
     */
    public function setRank(array $options = []): bool
    {
        return $this->perform(new SetPortalPolicyRankRequest($options));
    }

    /**
     * Swaps the rank position of the two supplied portal policies: POST /policy/portal/rank/swap.
     *
     * @param  array<string, mixed>  $options  Query options: id1, id2
     */
    public function swapRanks(array $options = []): bool
    {
        return $this->perform(new SwapPortalPolicyRanksRequest($options));
    }
}
