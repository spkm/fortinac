<?php

namespace spkm\FortiNac\Requests\User\CurrentSession;

use spkm\FortiNac\Data\User\SessionTimeout;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the number of seconds until the session for the current user expires: GET /user/current-session/timeout.
 */
class GetCurrentSessionTimeoutRequest extends ItemRequest
{
    protected ?string $dto = SessionTimeout::class;

    public function resolveEndpoint(): string
    {
        return '/user/current-session/timeout';
    }
}
