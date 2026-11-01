<?php

namespace spkm\FortiNac\Requests\User\CurrentSession;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Synchronizes the bookmarks for the current user to match the set of supplied UUIDs: POST /user/current-session/bookmark/sync.
 */
class PostCurrentSessionBookmarkSyncRequest extends WriteRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/current-session/bookmark/sync';
    }
}
