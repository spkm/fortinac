<?php

namespace spkm\FortiNac\Requests\User\AdminProfile;

use spkm\FortiNac\Data\User\AdminProfile;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Admin Profile record, updating instead if the supplied profile has a DBID of one that already exists: POST /user/admin-profile.
 */
class CreateAdminProfileRequest extends WriteRequest
{
    protected ?string $dto = AdminProfile::class;

    public function resolveEndpoint(): string
    {
        return '/user/admin-profile';
    }
}
