<?php

namespace spkm\FortiNac\Requests\User\AdminProfile;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Admin Profile record by ID: POST /user/admin-profile/{id}/delete.
 */
class DeleteAdminProfileViaPostRequest extends ActionRequest
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
        return '/user/admin-profile/'.$this->id.'/delete';
    }
}
