<?php

namespace spkm\FortiNac\Resources\Policy;

use spkm\FortiNac\Data\Policy\SecurityRule;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\CreateSecurityRuleRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\DeleteManySecurityRulesRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\DeleteSecurityRuleRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\DeleteSecurityRuleViaPostRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\DisableSecurityRuleRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\EnableSecurityRuleRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\GetSecurityRuleRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\GetSecurityRulesRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\SetSecurityRuleRankRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\SwapSecurityRuleRanksRequest;
use spkm\FortiNac\Requests\Policy\SecurityRule\UpdateSecurityRuleRequest;

/**
 * Security Rule, from FortiNac::policy()->securityRules().
 *
 * @extends Builder<SecurityRule>
 */
class SecurityRuleResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, SecurityRule::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSecurityRulesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetSecurityRuleRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateSecurityRuleRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateSecurityRuleRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteSecurityRuleRequest($this->intId($id), $options);
    }

    /**
     * Deletes a list of Security Rule records supplied under the id parameter: POST /policy/security-rule/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManySecurityRulesRequest(['id' => $ids]));
    }

    /**
     * Disables the supplied Security Rule: POST /policy/security-rule/{id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $id, array $options = []): bool
    {
        return $this->perform(new DisableSecurityRuleRequest($id, $options));
    }

    /**
     * Enables the supplied Security Rule: POST /policy/security-rule/{id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): bool
    {
        return $this->perform(new EnableSecurityRuleRequest($id, $options));
    }

    /**
     * Deletes a single Security Rule record by ID: POST /policy/security-rule/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteSecurityRuleViaPostRequest($id, $options));
    }

    /**
     * Sets the rank of the supplied Security Rule, shifting other ranks as necessary: POST /policy/security-rule/rank/set.
     *
     * @param  array<string, mixed>  $options  Query options: id, rank
     */
    public function setRank(array $options = []): bool
    {
        return $this->perform(new SetSecurityRuleRankRequest($options));
    }

    /**
     * Swaps the rank of the two supplied Security Rules: POST /policy/security-rule/rank/swap.
     *
     * @param  array<string, mixed>  $options  Query options: id1, id2
     */
    public function swapRanks(array $options = []): bool
    {
        return $this->perform(new SwapSecurityRuleRanksRequest($options));
    }
}
