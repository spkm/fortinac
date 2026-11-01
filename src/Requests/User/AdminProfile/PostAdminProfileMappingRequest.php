<?php

namespace spkm\FortiNac\Requests\User\AdminProfile;

use spkm\FortiNac\Data\User\AdminProfileMapping;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Admin Profile Mapping record, updating instead if the supplied profile has a DBID of one that already exists: POST /user/admin-profile/mapping.
 */
class PostAdminProfileMappingRequest extends WriteRequest
{
    protected ?string $dto = AdminProfileMapping::class;

    public function resolveEndpoint(): string
    {
        return '/user/admin-profile/mapping';
    }
}
