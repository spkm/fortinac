<?php

namespace spkm\FortiNac\Requests\User\CurrentSession;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single user bookmark record by ID: DELETE /user/current-session/bookmark/{id}.
 */
class DeleteCurrentSessionBookmarkByIdRequest extends DeleteRequest
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
        return '/user/current-session/bookmark/'.$this->id;
    }
}
