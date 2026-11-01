<?php

namespace spkm\FortiNac\Requests\System\Group;

use spkm\FortiNac\Data\System\Group;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all group records which match the supplied filter: GET /system/group.
 */
class GetGroupsRequest extends ListRequest
{
    protected ?string $dto = Group::class;

    public function resolveEndpoint(): string
    {
        return '/system/group';
    }
}
