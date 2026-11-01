<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Swaps the rank position of the two supplied Authentication Policies: POST /policy/authentication/rank/swap.
 *
 * Parameters: id1, id2.
 */
class SwapAuthenticationPolicyRanksRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/authentication/rank/swap';
    }
}
