<?php

namespace spkm\FortiNac\Requests\User\CurrentSession;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Returns the value in the current user session. Used by the GUI for storing temporary values that don't belong in the database: POST /user/current-session/cache.
 *
 * Parameters: key, value.
 */
class PostCurrentSessionCacheRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/current-session/cache';
    }
}
