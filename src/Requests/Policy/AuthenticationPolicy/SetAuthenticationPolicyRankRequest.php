<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Creates a new Authentication Policy record, updating instead if the supplied policy has a DBID of one that already exists: POST /policy/authentication/rank/set.
 *
 * Parameters: id, rank.
 */
class SetAuthenticationPolicyRankRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/authentication/rank/set';
    }
}
