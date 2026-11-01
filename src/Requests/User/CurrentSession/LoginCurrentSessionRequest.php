<?php

namespace spkm\FortiNac\Requests\User\CurrentSession;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Authenticates the user and, if successful, returns the Security Key for current session that must be appended to every request to verify its source: POST /user/current-session/login.
 *
 * Parameters: user, password.
 */
class LoginCurrentSessionRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/current-session/login';
    }
}
