<?php

namespace spkm\FortiNac\Requests\User\AdminProfile;

use spkm\FortiNac\Data\User\AdminProfileMapping;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Admin Profile Mapping records matching the supplied filter: GET /user/admin-profile/mapping.
 */
class GetAdminProfileMappingRequest extends ListRequest
{
    protected ?string $dto = AdminProfileMapping::class;

    public function resolveEndpoint(): string
    {
        return '/user/admin-profile/mapping';
    }
}
