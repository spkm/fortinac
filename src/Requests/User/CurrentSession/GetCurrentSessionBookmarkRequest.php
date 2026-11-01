<?php

namespace spkm\FortiNac\Requests\User\CurrentSession;

use spkm\FortiNac\Data\User\CurrentSessionBookmark;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of User Bookmark records matching the supplied filter: GET /user/current-session/bookmark.
 */
class GetCurrentSessionBookmarkRequest extends ListRequest
{
    protected ?string $dto = CurrentSessionBookmark::class;

    public function resolveEndpoint(): string
    {
        return '/user/current-session/bookmark';
    }
}
