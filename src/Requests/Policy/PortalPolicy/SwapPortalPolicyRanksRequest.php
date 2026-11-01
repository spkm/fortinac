<?php

namespace spkm\FortiNac\Requests\Policy\PortalPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Swaps the rank position of the two supplied portal policies: POST /policy/portal/rank/swap.
 *
 * Parameters: id1, id2.
 */
class SwapPortalPolicyRanksRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/portal/rank/swap';
    }
}
