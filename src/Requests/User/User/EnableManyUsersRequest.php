<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the User that matches the supplied DBID: POST /user/enable.
 *
 * Parameters: userID.
 */
class EnableManyUsersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/enable';
    }
}
