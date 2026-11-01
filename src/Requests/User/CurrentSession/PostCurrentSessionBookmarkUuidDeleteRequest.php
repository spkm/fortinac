<?php

namespace spkm\FortiNac\Requests\User\CurrentSession;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of User Bookmark records supplied under the id parameter: POST /user/current-session/bookmark/uuid/{uuid}/delete.
 */
class PostCurrentSessionBookmarkUuidDeleteRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $uuid, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/user/current-session/bookmark/uuid/'.$this->uuid.'/delete';
    }
}
