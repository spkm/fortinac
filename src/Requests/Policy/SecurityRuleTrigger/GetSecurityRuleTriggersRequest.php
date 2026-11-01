<?php

namespace spkm\FortiNac\Requests\Policy\SecurityRuleTrigger;

use spkm\FortiNac\Data\Policy\SecurityRuleTrigger;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Security Trigger records matching the supplied filter: GET /policy/security-rule-trigger.
 */
class GetSecurityRuleTriggersRequest extends ListRequest
{
    protected ?string $dto = SecurityRuleTrigger::class;

    public function resolveEndpoint(): string
    {
        return '/policy/security-rule-trigger';
    }
}
