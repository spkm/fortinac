<?php

namespace spkm\FortiNac\Requests\User\AdminProfile;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Admin Profile records supplied by the id parameter: POST /user/admin-profile/delete.
 *
 * Parameters: id.
 */
class DeleteManyAdminProfilesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/admin-profile/delete';
    }
}
