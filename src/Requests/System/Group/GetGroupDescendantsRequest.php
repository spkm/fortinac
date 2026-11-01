<?php

namespace spkm\FortiNac\Requests\System\Group;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns all groups that are descendants of the supplied group. If includeParentGroup is true, the list of groups will also include the supplied group: GET /system/group/{id}/descendants.
 *
 * Parameters: includeParent.
 */
class GetGroupDescendantsRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: includeParent
     */
    public function __construct(protected int $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/system/group/'.$this->id.'/descendants';
    }
}
