<?php

namespace spkm\FortiNac\Requests\User\CurrentSession;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single user bookmark record by ID: POST /user/current-session/bookmark/delete.
 *
 * Parameters: id.
 */
class PostCurrentSessionBookmarkDeleteRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/current-session/bookmark/delete';
    }
}
