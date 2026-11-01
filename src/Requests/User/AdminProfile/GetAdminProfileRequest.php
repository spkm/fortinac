<?php

namespace spkm\FortiNac\Requests\User\AdminProfile;

use spkm\FortiNac\Data\User\AdminProfile;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Admin Profile matching both the ID passed as a parameter, and the supplied filter: GET /user/admin-profile/{id}.
 */
class GetAdminProfileRequest extends ItemRequest
{
    protected ?string $dto = AdminProfile::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/user/admin-profile/'.$this->id;
    }
}
