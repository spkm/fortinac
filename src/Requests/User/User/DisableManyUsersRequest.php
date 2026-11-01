<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Disables the User that matches the supplied DBID: POST /user/disable.
 *
 * Parameters: userID.
 */
class DisableManyUsersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/disable';
    }
}
