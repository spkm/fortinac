<?php

namespace spkm\FortiNac\Requests\Policy\UserHostProfile;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single User/Host Profile record by ID: POST /policy/user-host-profile/{id}/delete.
 */
class DeleteUserHostProfileViaPostRequest extends ActionRequest
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
        return '/policy/user-host-profile/'.$this->id.'/delete';
    }
}
