<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the number of allowed hosts set per user: GET /user/allow-hosts.
 */
class GetUserAllowHostsRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/user/allow-hosts';
    }
}
