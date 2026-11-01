<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Data\User\User;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all user records which match the supplied filter: GET /user.
 */
class GetUsersRequest extends ListRequest
{
    protected ?string $dto = User::class;

    public function resolveEndpoint(): string
    {
        return '/user';
    }
}
