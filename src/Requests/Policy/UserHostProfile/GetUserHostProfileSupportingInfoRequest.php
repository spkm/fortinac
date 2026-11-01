<?php

namespace spkm\FortiNac\Requests\Policy\UserHostProfile;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a series of related data records used to create User/Host Profiles: GET /policy/user-host-profile/supporting-info.
 */
class GetUserHostProfileSupportingInfoRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/user-host-profile/supporting-info';
    }
}
