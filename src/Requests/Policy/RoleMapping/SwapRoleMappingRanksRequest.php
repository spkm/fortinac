<?php

namespace spkm\FortiNac\Requests\Policy\RoleMapping;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Swaps the rank position of the two supplied role mappings: POST /policy/role-mapping/rank/swap.
 *
 * Parameters: id1, id2.
 */
class SwapRoleMappingRanksRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/role-mapping/rank/swap';
    }
}
