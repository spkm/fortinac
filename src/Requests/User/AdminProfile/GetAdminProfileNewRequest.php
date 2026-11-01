<?php

namespace spkm\FortiNac\Requests\User\AdminProfile;

use spkm\FortiNac\Data\User\AdminProfile;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a new, empty Admin Profile that can be used to check the available permission sets: GET /user/admin-profile/new.
 */
class GetAdminProfileNewRequest extends ItemRequest
{
    protected ?string $dto = AdminProfile::class;

    public function resolveEndpoint(): string
    {
        return '/user/admin-profile/new';
    }
}
