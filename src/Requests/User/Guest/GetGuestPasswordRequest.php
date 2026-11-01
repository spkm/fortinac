<?php

namespace spkm\FortiNac\Requests\User\Guest;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Gets the password from the guest record using the provided record id, if possible: POST /user/guest/get-password.
 *
 * Parameters: id.
 */
class GetGuestPasswordRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/guest/get-password';
    }
}
