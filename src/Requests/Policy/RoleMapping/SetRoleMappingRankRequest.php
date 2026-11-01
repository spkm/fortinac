<?php

namespace spkm\FortiNac\Requests\Policy\RoleMapping;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the rank of supplied role mapping, shifting other ranks as necessary: POST /policy/role-mapping/rank/set.
 *
 * Parameters: id, rank.
 */
class SetRoleMappingRankRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/role-mapping/rank/set';
    }
}
