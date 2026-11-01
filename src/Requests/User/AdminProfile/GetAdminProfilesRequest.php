<?php

namespace spkm\FortiNac\Requests\User\AdminProfile;

use spkm\FortiNac\Data\User\AdminProfile;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Admin Profile records matching the supplied filter: GET /user/admin-profile.
 */
class GetAdminProfilesRequest extends ListRequest
{
    protected ?string $dto = AdminProfile::class;

    public function resolveEndpoint(): string
    {
        return '/user/admin-profile';
    }
}
