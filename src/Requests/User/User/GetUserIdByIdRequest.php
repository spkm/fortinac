<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Data\User\User;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the user record with the supplied DBID: GET /user/id/{id}.
 */
class GetUserIdByIdRequest extends ItemRequest
{
    protected ?string $dto = User::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/user/id/'.$this->id;
    }
}
