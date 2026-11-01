<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Data\User\User;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds a new user record to the database: POST /user.
 */
class CreateUserRequest extends WriteRequest
{
    protected ?string $dto = User::class;

    public function resolveEndpoint(): string
    {
        return '/user';
    }
}
