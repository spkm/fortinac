<?php

namespace spkm\FortiNac\Requests\Policy\Role;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the rank of the supplied role, shifting other ranks as necessary: POST /policy/role/rank/set.
 *
 * Parameters: id, rank.
 */
class SetRoleRankRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/role/rank/set';
    }
}
