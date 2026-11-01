<?php

namespace spkm\FortiNac\Requests\Policy\AccessPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Swaps the rank position of the two supplied Access Policies: POST /policy/access/rank/swap.
 *
 * Parameters: id1, id2.
 */
class SwapAccessPolicyRanksRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/access/rank/swap';
    }
}
