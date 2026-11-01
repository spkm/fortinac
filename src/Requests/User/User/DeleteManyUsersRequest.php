<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the user record or records supplied, if they are not currently in use: POST /user/delete.
 *
 * Parameters: id.
 */
class DeleteManyUsersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/delete';
    }
}
