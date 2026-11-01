<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the user record or records supplied, if they are not currently in use: POST /user/{id}/delete.
 */
class DeleteUserViaPostRequest extends ActionRequest
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
        return '/user/'.$this->id.'/delete';
    }
}
