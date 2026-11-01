<?php

namespace spkm\FortiNac\Requests\Policy\UserHostProfile;

use spkm\FortiNac\Data\Policy\UserHostProfile;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of User/Host Profile records matching the supplied filter: GET /policy/user-host-profile/{id}.
 */
class GetUserHostProfileRequest extends ItemRequest
{
    protected ?string $dto = UserHostProfile::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/user-host-profile/'.$this->id;
    }
}
