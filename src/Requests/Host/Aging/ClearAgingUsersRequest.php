<?php

namespace spkm\FortiNac\Requests\Host\Aging;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Clear Aging values for all Users: POST /host/aging/clear-users.
 */
class ClearAgingUsersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/aging/clear-users';
    }
}
