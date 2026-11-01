<?php

namespace spkm\FortiNac\Requests\Policy\UserHostProfile;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of User/Host Profile records supplied under the id parameter: POST /policy/user-host-profile/delete.
 *
 * Parameters: id.
 */
class DeleteManyUserHostProfilesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/user-host-profile/delete';
    }
}
