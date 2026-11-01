<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns a count of user records matching the supplied filter: GET /user/count.
 */
class CountUsersRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/count';
    }
}
