<?php

namespace spkm\FortiNac\Requests\System\Group;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns a count of group records matching the supplied filter: GET /system/group/count.
 */
class CountGroupsRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/group/count';
    }
}
