<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the password of a local user account: POST /user/set-password.
 *
 * Parameters: userID, password.
 */
class SetUserPasswordRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/set-password';
    }
}
