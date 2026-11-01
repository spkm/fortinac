<?php

namespace spkm\FortiNac\Requests\Policy\AccessPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the rank of the supplied Access Policy, shifting other ranks as necessary: POST /policy/access/rank/set.
 *
 * Parameters: id, rank.
 */
class SetAccessPolicyRankRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/access/rank/set';
    }
}
