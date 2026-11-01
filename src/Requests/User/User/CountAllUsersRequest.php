<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a count of all user records in the database: GET /user/count/all.
 */
class CountAllUsersRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/user/count/all';
    }
}
