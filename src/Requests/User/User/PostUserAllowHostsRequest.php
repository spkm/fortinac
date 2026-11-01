<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the limit for number of hosts allowed per user: POST /user/allow-hosts.
 */
class PostUserAllowHostsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/allow-hosts';
    }
}
