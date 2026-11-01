<?php

namespace spkm\FortiNac\Requests\Policy\UserHostProfile;

use spkm\FortiNac\Data\Policy\UserHostProfile;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new User/Host Profile record, updating instead if the supplied profile has a DBID of one that already exists: POST /policy/user-host-profile.
 */
class CreateUserHostProfileRequest extends WriteRequest
{
    protected ?string $dto = UserHostProfile::class;

    public function resolveEndpoint(): string
    {
        return '/policy/user-host-profile';
    }
}
