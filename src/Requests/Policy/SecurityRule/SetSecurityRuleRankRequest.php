<?php

namespace spkm\FortiNac\Requests\Policy\SecurityRule;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the rank of the supplied Security Rule, shifting other ranks as necessary: POST /policy/security-rule/rank/set.
 *
 * Parameters: id, rank.
 */
class SetSecurityRuleRankRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/security-rule/rank/set';
    }
}
