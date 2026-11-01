<?php

namespace spkm\FortiNac\Requests\User\AdminProfile;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Admin Profile Mapping record by ID: DELETE /user/admin-profile/mapping/{id}.
 */
class DeleteAdminProfileMappingByIdRequest extends DeleteRequest
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
        return '/user/admin-profile/mapping/'.$this->id;
    }
}
