<?php

namespace spkm\FortiNac\Requests\Policy\Role;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Swaps the rank position of the two supplied roles: POST /policy/role/rank/swap.
 *
 * Parameters: id1, id2.
 */
class SwapRoleRanksRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/role/rank/swap';
    }
}
