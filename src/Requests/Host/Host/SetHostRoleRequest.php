<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the role for a list of Host Records: POST /host/set-role.
 *
 * Parameters: id, role.
 */
class SetHostRoleRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/set-role';
    }
}
