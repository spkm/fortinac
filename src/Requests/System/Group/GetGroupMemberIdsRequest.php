<?php

namespace spkm\FortiNac\Requests\System\Group;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the member IDs of all descendant members: GET /system/group/{id}/member-ids.
 */
class GetGroupMemberIdsRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/system/group/'.$this->id.'/member-ids';
    }
}
