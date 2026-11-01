<?php

namespace spkm\FortiNac\Requests\Policy\UserHostProfile;

use spkm\FortiNac\Data\Policy\UserHostProfile;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of User/Host Profile records matching the supplied filter: GET /policy/user-host-profile.
 */
class GetUserHostProfilesRequest extends ListRequest
{
    protected ?string $dto = UserHostProfile::class;

    public function resolveEndpoint(): string
    {
        return '/policy/user-host-profile';
    }
}
