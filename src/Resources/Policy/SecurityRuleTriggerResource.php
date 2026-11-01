<?php

namespace spkm\FortiNac\Resources\Policy;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Policy\SecurityRuleTrigger;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\SecurityRuleTrigger\CreateSecurityRuleTriggerRequest;
use spkm\FortiNac\Requests\Policy\SecurityRuleTrigger\DeleteManySecurityRuleTriggersRequest;
use spkm\FortiNac\Requests\Policy\SecurityRuleTrigger\DeleteSecurityRuleTriggerRequest;
use spkm\FortiNac\Requests\Policy\SecurityRuleTrigger\DeleteSecurityRuleTriggerViaPostRequest;
use spkm\FortiNac\Requests\Policy\SecurityRuleTrigger\GetSecurityRuleTriggerRequest;
use spkm\FortiNac\Requests\Policy\SecurityRuleTrigger\GetSecurityRuleTriggersRequest;
use spkm\FortiNac\Requests\Policy\SecurityRuleTrigger\GetSecurityRuleTriggerUsageRequest;
use spkm\FortiNac\Requests\Policy\SecurityRuleTrigger\UpdateSecurityRuleTriggerRequest;

/**
 * Security Rule, from FortiNac::policy()->securityRuleTriggers().
 *
 * @extends Builder<SecurityRuleTrigger>
 */
class SecurityRuleTriggerResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, SecurityRuleTrigger::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSecurityRuleTriggersRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetSecurityRuleTriggerRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateSecurityRuleTriggerRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateSecurityRuleTriggerRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteSecurityRuleTriggerRequest((int) $id, $options);
    }

    /**
     * Returns a list of records that reference this Security Trigger record: GET /policy/security-rule-trigger/{id}/usage.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetSecurityRuleTriggerUsageRequest($id, $query));
    }

    /**
     * Deletes a single Security Trigger record by ID: POST /policy/security-rule-trigger/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteSecurityRuleTriggerViaPostRequest($id, $options));
    }

    /**
     * Deletes a list of Security Trigger records supplied under the id parameter: POST /policy/security-rule-trigger/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManySecurityRuleTriggersRequest(['id' => $ids]));
    }
}
