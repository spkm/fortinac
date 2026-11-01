<?php

namespace spkm\FortiNac\Requests\Policy\SecurityRule;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Swaps the rank of the two supplied Security Rules: POST /policy/security-rule/rank/swap.
 *
 * Parameters: id1, id2.
 */
class SwapSecurityRuleRanksRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/security-rule/rank/swap';
    }
}
