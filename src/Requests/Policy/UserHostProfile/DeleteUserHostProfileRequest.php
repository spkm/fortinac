<?php

namespace spkm\FortiNac\Requests\Policy\UserHostProfile;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a User/Host Profile record by ID: DELETE /policy/user-host-profile/{id}.
 */
class DeleteUserHostProfileRequest extends DeleteRequest
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
        return '/policy/user-host-profile/'.$this->id;
    }
}
