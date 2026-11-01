<?php

namespace spkm\FortiNac\Requests\User\AdminProfile;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Swaps the rank position of the two supplied Admin Profile Mappings: POST /user/admin-profile/mapping/rank/swap.
 *
 * Parameters: id1, id2.
 */
class PostAdminProfileMappingRankSwapRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/admin-profile/mapping/rank/swap';
    }
}
