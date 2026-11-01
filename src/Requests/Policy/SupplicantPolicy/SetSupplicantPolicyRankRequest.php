<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the rank of the supplied Supplicant Policy, shifting other ranks as necessary: POST /policy/supplicant/rank/set.
 *
 * Parameters: id, rank.
 */
class SetSupplicantPolicyRankRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/supplicant/rank/set';
    }
}
