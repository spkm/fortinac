<?php

namespace spkm\FortiNac\Requests\System\Group;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all group records in the database: GET /system/group/count/all.
 */
class CountAllGroupsRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/system/group/count/all';
    }
}
