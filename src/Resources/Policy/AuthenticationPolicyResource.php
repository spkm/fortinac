<?php

namespace spkm\FortiNac\Resources\Policy;

use spkm\FortiNac\Data\Policy\AuthenticationPolicy;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\CreateAuthenticationPolicyRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\DeleteAuthenticationPolicyRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\DeleteAuthenticationPolicyViaPostRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\DeleteManyAuthenticationPoliciesRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\DisableAuthenticationPolicyRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\DisableManyAuthenticationPoliciesRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\EnableAuthenticationPolicyRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\EnableManyAuthenticationPoliciesRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\GetAuthenticationPoliciesRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\GetAuthenticationPolicyRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\SetAuthenticationPolicyRankRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\SwapAuthenticationPolicyRanksRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationPolicy\UpdateAuthenticationPolicyRequest;

/**
 * Authentication Policy, from FortiNac::policy()->authenticationPolicies().
 *
 * @extends Builder<AuthenticationPolicy>
 */
class AuthenticationPolicyResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, AuthenticationPolicy::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAuthenticationPoliciesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetAuthenticationPolicyRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateAuthenticationPolicyRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateAuthenticationPolicyRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteAuthenticationPolicyRequest($this->intId($id), $options);
    }

    /**
     * Deletes a list of Authentication Policy records supplied under the id parameter: POST /policy/authentication/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyAuthenticationPoliciesRequest(['id' => $ids]));
    }

    /**
     * Disables the supplied Authentication Policy: POST /policy/authentication/disable.
     *
     * @param  list<int|string>  $ids
     */
    public function disableMany(array $ids): bool
    {
        return $this->perform(new DisableManyAuthenticationPoliciesRequest(['id' => $ids]));
    }

    /**
     * Enables a list of Authentication Policy supplied under the id parameter: POST /policy/authentication/enable.
     *
     * @param  list<int|string>  $ids
     */
    public function enableMany(array $ids): bool
    {
        return $this->perform(new EnableManyAuthenticationPoliciesRequest(['id' => $ids]));
    }

    /**
     * Deletes a single Authentication Policy record by ID: POST /policy/authentication/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteAuthenticationPolicyViaPostRequest($id, $options));
    }

    /**
     * Disables the supplied Authentication Policy: POST /policy/authentication/{id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $id, array $options = []): bool
    {
        return $this->perform(new DisableAuthenticationPolicyRequest($id, $options));
    }

    /**
     * Enables the supplied Authentication Policy: POST /policy/authentication/{id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): bool
    {
        return $this->perform(new EnableAuthenticationPolicyRequest($id, $options));
    }

    /**
     * Creates a new Authentication Policy record, updating instead if the supplied policy has a DBID of one that already exists: POST /policy/authentication/rank/set.
     *
     * @param  array<string, mixed>  $options  Query options: id, rank
     */
    public function setRank(array $options = []): bool
    {
        return $this->perform(new SetAuthenticationPolicyRankRequest($options));
    }

    /**
     * Swaps the rank position of the two supplied Authentication Policies: POST /policy/authentication/rank/swap.
     *
     * @param  array<string, mixed>  $options  Query options: id1, id2
     */
    public function swapRanks(array $options = []): bool
    {
        return $this->perform(new SwapAuthenticationPolicyRanksRequest($options));
    }
}
