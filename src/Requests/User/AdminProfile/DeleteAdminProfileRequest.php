<?php

namespace spkm\FortiNac\Requests\User\AdminProfile;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Admin Profile record by ID: DELETE /user/admin-profile/{id}.
 */
class DeleteAdminProfileRequest extends DeleteRequest
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
        return '/user/admin-profile/'.$this->id;
    }
}
