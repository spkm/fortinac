<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the specified Admin Profile for the supplied set of Admin Users: POST /user/set-profile.
 *
 * Parameters: profileID, id.
 */
class SetUserProfileRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/set-profile';
    }
}
