<?php

namespace spkm\FortiNac\Requests\User\AdminProfile;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a map of Permission Sets to Views: GET /user/admin-profile/permission-view-map.
 */
class GetAdminProfilePermissionViewMapRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/admin-profile/permission-view-map';
    }
}
