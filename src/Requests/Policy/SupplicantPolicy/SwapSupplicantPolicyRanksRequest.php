<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Swaps the rank position of the two supplied Supplicant Policies: POST /policy/supplicant/rank/swap.
 *
 * Parameters: id1, id2.
 */
class SwapSupplicantPolicyRanksRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/supplicant/rank/swap';
    }
}
