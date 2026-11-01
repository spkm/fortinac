<?php

namespace spkm\FortiNac\Requests\System\Group;

use spkm\FortiNac\Data\System\GroupMembers;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns all descendant members and subgroups for this group: GET /system/group/{id}/members.
 *
 * Parameters: getImages, getSubGroups.
 */
class GetGroupMembersRequest extends ItemRequest
{
    protected ?string $dto = GroupMembers::class;

    /**
     * @param  array<string, mixed>  $options  Query options: getImages, getSubGroups
     */
    public function __construct(protected int $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/system/group/'.$this->id.'/members';
    }
}
