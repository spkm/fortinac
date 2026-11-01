<?php

namespace spkm\FortiNac\Requests\User\AdminProfile;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Retrieves information necessary to create or modify an Admin Profile Mapping: GET /user/admin-profile/mapping/supporting-info.
 */
class GetAdminProfileMappingSupportingInfoRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/admin-profile/mapping/supporting-info';
    }
}
