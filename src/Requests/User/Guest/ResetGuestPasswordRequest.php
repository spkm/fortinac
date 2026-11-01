<?php

namespace spkm\FortiNac\Requests\User\Guest;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Resets the password for one or more guest accounts: POST /user/guest/reset-password.
 *
 * Parameters: id.
 */
class ResetGuestPasswordRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/guest/reset-password';
    }
}
