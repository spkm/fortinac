<?php

namespace spkm\FortiNac\Requests\User\AdminProfile;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the rank of the supplied Admin Profile Mapping, shifting other ranks as necessary: POST /user/admin-profile/mapping/rank/set.
 *
 * Parameters: id, rank.
 */
class PostAdminProfileMappingRankSetRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/admin-profile/mapping/rank/set';
    }
}
