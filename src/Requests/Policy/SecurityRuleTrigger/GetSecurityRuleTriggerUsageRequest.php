<?php

namespace spkm\FortiNac\Requests\Policy\SecurityRuleTrigger;

use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of records that reference this Security Trigger record: GET /policy/security-rule-trigger/{id}/usage.
 */
class GetSecurityRuleTriggerUsageRequest extends ListRequest
{
    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected int $id, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/policy/security-rule-trigger/'.$this->id.'/usage';
    }
}
