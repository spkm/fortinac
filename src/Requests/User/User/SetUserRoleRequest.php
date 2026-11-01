<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the Role for a list of users: POST /user/set-role.
 *
 * Parameters: id, role.
 */
class SetUserRoleRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/set-role';
    }
}
