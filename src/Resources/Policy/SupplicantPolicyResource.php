<?php

namespace spkm\FortiNac\Resources\Policy;

use spkm\FortiNac\Data\Policy\SupplicantPolicy;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\CreateSupplicantPolicyRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\DeleteManySupplicantPoliciesRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\DeleteSupplicantPolicyRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\DeleteSupplicantPolicyViaPostRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\DisableManySupplicantPoliciesRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\DisableSupplicantPolicyRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\EnableManySupplicantPoliciesRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\EnableSupplicantPolicyRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\GetSupplicantPoliciesRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\GetSupplicantPolicyRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\GetSupplicantPolicySupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\SetSupplicantPolicyRankRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\SwapSupplicantPolicyRanksRequest;
use spkm\FortiNac\Requests\Policy\SupplicantPolicy\UpdateSupplicantPolicyRequest;

/**
 * Supplicant Policy, from FortiNac::policy()->supplicantPolicies().
 *
 * @extends Builder<SupplicantPolicy>
 */
class SupplicantPolicyResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, SupplicantPolicy::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSupplicantPoliciesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetSupplicantPolicyRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateSupplicantPolicyRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateSupplicantPolicyRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteSupplicantPolicyRequest($this->intId($id), $options);
    }

    /**
     * Returns the information used to create a Supplicant Policy: GET /policy/supplicant/supporting-info.
     */
    public function supportingInfo(): mixed
    {
        return $this->fetch(new GetSupplicantPolicySupportingInfoRequest);
    }

    /**
     * Deletes a list of Supplicant Policy records supplied under the id parameter: POST /policy/supplicant/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManySupplicantPoliciesRequest(['id' => $ids]));
    }

    /**
     * Disables the supplied Supplicant Policy: POST /policy/supplicant/disable.
     *
     * @param  list<int|string>  $ids
     */
    public function disableMany(array $ids): bool
    {
        return $this->perform(new DisableManySupplicantPoliciesRequest(['id' => $ids]));
    }

    /**
     * Enables the supplied Supplicant Policy: POST /policy/supplicant/enable.
     *
     * @param  list<int|string>  $ids
     */
    public function enableMany(array $ids): bool
    {
        return $this->perform(new EnableManySupplicantPoliciesRequest(['id' => $ids]));
    }

    /**
     * Deletes a single Supplicant Policy record by ID: POST /policy/supplicant/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteSupplicantPolicyViaPostRequest($id, $options));
    }

    /**
     * Disables the supplied Supplicant Policy: POST /policy/supplicant/{id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $id, array $options = []): bool
    {
        return $this->perform(new DisableSupplicantPolicyRequest($id, $options));
    }

    /**
     * Enables the supplied Supplicant Policy: POST /policy/supplicant/{id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): bool
    {
        return $this->perform(new EnableSupplicantPolicyRequest($id, $options));
    }

    /**
     * Sets the rank of the supplied Supplicant Policy, shifting other ranks as necessary: POST /policy/supplicant/rank/set.
     *
     * @param  array<string, mixed>  $options  Query options: id, rank
     */
    public function setRank(array $options = []): bool
    {
        return $this->perform(new SetSupplicantPolicyRankRequest($options));
    }

    /**
     * Swaps the rank position of the two supplied Supplicant Policies: POST /policy/supplicant/rank/swap.
     *
     * @param  array<string, mixed>  $options  Query options: id1, id2
     */
    public function swapRanks(array $options = []): bool
    {
        return $this->perform(new SwapSupplicantPolicyRanksRequest($options));
    }
}
