<?php

namespace spkm\FortiNac\Requests\Policy\SecurityRuleTrigger;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Security Trigger record, updating instead if the supplied profile has DBID of one that already exists: POST /policy/security-rule-trigger.
 */
class CreateSecurityRuleTriggerRequest extends WriteRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/policy/security-rule-trigger';
    }
}
