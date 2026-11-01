<?php

namespace spkm\FortiNac\Requests\Policy\PortalPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the rank of the supplied portal policy, shifting other ranks as necessary: POST /policy/portal/rank/set.
 *
 * Parameters: id, rank.
 */
class SetPortalPolicyRankRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/portal/rank/set';
    }
}
