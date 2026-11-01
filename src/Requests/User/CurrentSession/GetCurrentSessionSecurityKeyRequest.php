<?php

namespace spkm\FortiNac\Requests\User\CurrentSession;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the Security Key for the current session that must be appended to every request to verify its source: GET /user/current-session/securityKey.
 */
class GetCurrentSessionSecurityKeyRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/current-session/securityKey';
    }
}
