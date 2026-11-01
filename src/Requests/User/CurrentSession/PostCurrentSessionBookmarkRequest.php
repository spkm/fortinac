<?php

namespace spkm\FortiNac\Requests\User\CurrentSession;

use spkm\FortiNac\Data\User\CurrentSessionBookmark;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new User Bookmark record, updating instead if the supplied policy has a DBID of one that already exists: POST /user/current-session/bookmark.
 */
class PostCurrentSessionBookmarkRequest extends WriteRequest
{
    protected ?string $dto = CurrentSessionBookmark::class;

    public function resolveEndpoint(): string
    {
        return '/user/current-session/bookmark';
    }
}
