<?php

namespace spkm\FortiNac\Requests\Policy\SecurityRule;

use spkm\FortiNac\Data\Policy\SecurityRule;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Security Rule records matching the supplied filter: GET /policy/security-rule.
 */
class GetSecurityRulesRequest extends ListRequest
{
    protected ?string $dto = SecurityRule::class;

    public function resolveEndpoint(): string
    {
        return '/policy/security-rule';
    }
}
