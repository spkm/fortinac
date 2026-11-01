<?php

namespace spkm\FortiNac\Resources\Policy;

use spkm\FortiNac\Data\Policy\AccessPolicy;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\CreateAccessPolicyRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\DeleteAccessPolicyRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\DeleteAccessPolicyViaPostRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\DeleteManyAccessPoliciesRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\DisableAccessPolicyRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\DisableManyAccessPoliciesRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\EnableAccessPolicyRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\EnableManyAccessPoliciesRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\GetAccessPoliciesRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\GetAccessPolicyRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\GetAccessPolicySupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\SetAccessPolicyRankRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\SwapAccessPolicyRanksRequest;
use spkm\FortiNac\Requests\Policy\AccessPolicy\UpdateAccessPolicyRequest;

/**
 * Access Policy, from FortiNac::policy()->accessPolicies().
 *
 * @extends Builder<AccessPolicy>
 */
class AccessPolicyResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, AccessPolicy::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAccessPoliciesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetAccessPolicyRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateAccessPolicyRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateAccessPolicyRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteAccessPolicyRequest($this->intId($id), $options);
    }

    /**
     * Disables the supplied Access Policy: POST /policy/access/disable.
     *
     * @param  list<int|string>  $ids
     */
    public function disableMany(array $ids): bool
    {
        return $this->perform(new DisableManyAccessPoliciesRequest(['id' => $ids]));
    }

    /**
     * Returns the information necessary to create an Access Policy: GET /policy/access/supporting-info.
     */
    public function supportingInfo(): mixed
    {
        return $this->fetch(new GetAccessPolicySupportingInfoRequest);
    }

    /**
     * Deletes a list of Access Policy records supplied under the id parameter: POST /policy/access/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyAccessPoliciesRequest(['id' => $ids]));
    }

    /**
     * Enables the supplied Access Policy: POST /policy/access/enable.
     *
     * @param  list<int|string>  $ids
     */
    public function enableMany(array $ids): bool
    {
        return $this->perform(new EnableManyAccessPoliciesRequest(['id' => $ids]));
    }

    /**
     * Deletes a single Access Policy record by ID: POST /policy/access/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteAccessPolicyViaPostRequest($id, $options));
    }

    /**
     * Disables the supplied Access Policy: POST /policy/access/{id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $id, array $options = []): bool
    {
        return $this->perform(new DisableAccessPolicyRequest($id, $options));
    }

    /**
     * Enables the supplied Access Policy: POST /policy/access/{id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): bool
    {
        return $this->perform(new EnableAccessPolicyRequest($id, $options));
    }

    /**
     * Sets the rank of the supplied Access Policy, shifting other ranks as necessary: POST /policy/access/rank/set.
     *
     * @param  array<string, mixed>  $options  Query options: id, rank
     */
    public function setRank(array $options = []): bool
    {
        return $this->perform(new SetAccessPolicyRankRequest($options));
    }

    /**
     * Swaps the rank position of the two supplied Access Policies: POST /policy/access/rank/swap.
     *
     * @param  array<string, mixed>  $options  Query options: id1, id2
     */
    public function swapRanks(array $options = []): bool
    {
        return $this->perform(new SwapAccessPolicyRanksRequest($options));
    }
}
