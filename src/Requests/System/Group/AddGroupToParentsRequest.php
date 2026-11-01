<?php

namespace spkm\FortiNac\Requests\System\Group;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the parent groups to the supplied group of same type. If replace is true it also removes from any groups that this supplied group currently belongs to and by default replace is true: POST /system/group/add-to-parents.
 *
 * Parameters: parentID, groupID, replace.
 */
class AddGroupToParentsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/group/add-to-parents';
    }
}
