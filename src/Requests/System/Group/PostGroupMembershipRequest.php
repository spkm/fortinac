<?php

namespace spkm\FortiNac\Requests\System\Group;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the Group Membership for the supplied groups for the supplied member: POST /system/group/membership.
 *
 * Parameters: elemID, groupID, type, serverIP.
 */
class PostGroupMembershipRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/group/membership';
    }
}
