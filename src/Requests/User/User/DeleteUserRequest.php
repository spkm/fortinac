<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes the user record supplied, if it is not currently in use: DELETE /user/{id}.
 */
class DeleteUserRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/user/'.$this->id;
    }
}
