<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a boolean result if the user is the owner of one or more hosts: GET /user/has-hosts.
 */
class GetUserHasHostsRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/user/has-hosts';
    }
}
