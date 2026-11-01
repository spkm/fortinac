<?php

namespace spkm\FortiNac\Requests\User\CurrentSession;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the cached value in the current user session. Used by the GUI for storing temporary values that don't belong in the database: GET /user/current-session/cache.
 *
 * Parameters: key.
 */
class GetCurrentSessionCacheRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: key
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/user/current-session/cache';
    }
}
