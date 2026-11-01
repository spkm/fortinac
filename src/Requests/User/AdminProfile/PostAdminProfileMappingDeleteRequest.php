<?php

namespace spkm\FortiNac\Requests\User\AdminProfile;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Admin Profile Mapping records supplied under the id parameter: POST /user/admin-profile/mapping/delete.
 *
 * Parameters: id.
 */
class PostAdminProfileMappingDeleteRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/admin-profile/mapping/delete';
    }
}
