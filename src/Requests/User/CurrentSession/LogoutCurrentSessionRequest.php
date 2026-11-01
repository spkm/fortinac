<?php

namespace spkm\FortiNac\Requests\User\CurrentSession;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Ends and invalidates the current login session: POST /user/current-session/logout.
 */
class LogoutCurrentSessionRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/current-session/logout';
    }
}
