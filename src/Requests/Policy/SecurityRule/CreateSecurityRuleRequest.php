<?php

namespace spkm\FortiNac\Requests\Policy\SecurityRule;

use spkm\FortiNac\Data\Policy\SecurityRule;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Security Rule record updating instead if the supplied profile has a DBID of one that already exists: POST /policy/security-rule.
 */
class CreateSecurityRuleRequest extends WriteRequest
{
    protected ?string $dto = SecurityRule::class;

    public function resolveEndpoint(): string
    {
        return '/policy/security-rule';
    }
}
