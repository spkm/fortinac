<?php

namespace spkm\FortiNac\Requests\System\Group;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Adds members to a group or groups of a certain type and also adds groups to a group of a certain type: POST /system/group/add-members.
 *
 * Parameters: elemID, groupID, type.
 */
class AddGroupMembersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/group/add-members';
    }
}
