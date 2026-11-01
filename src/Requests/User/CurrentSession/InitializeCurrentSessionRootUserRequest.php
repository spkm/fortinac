<?php

namespace spkm\FortiNac\Requests\User\CurrentSession;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Performs a login which accepts the Acceptable Usage Policy. The login step must be repeated because the session is not valid until the Acceptable Usage Policy is accepted: POST /user/current-session/initialize-root-user.
 *
 * Parameters: user, password, newUserIdD, newPassword.
 */
class InitializeCurrentSessionRootUserRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/current-session/initialize-root-user';
    }
}
