<?php

namespace spkm\FortiNac\Requests\System\Group;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Removes a set of member IDs from a set of group IDs, if the member exists within the group: POST /system/group/remove-members.
 *
 * Parameters: elemID, groupID.
 */
class RemoveGroupMembersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/group/remove-members';
    }
}
