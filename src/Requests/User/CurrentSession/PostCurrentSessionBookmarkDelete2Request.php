<?php

namespace spkm\FortiNac\Requests\User\CurrentSession;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single user bookmark record by ID: POST /user/current-session/bookmark/{id}/delete.
 */
class PostCurrentSessionBookmarkDelete2Request extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/user/current-session/bookmark/'.$this->id.'/delete';
    }
}
