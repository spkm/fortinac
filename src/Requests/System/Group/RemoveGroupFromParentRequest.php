<?php

namespace spkm\FortiNac\Requests\System\Group;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Removes one or more groups from the supplied parent group: POST /system/group/remove-from-parent.
 *
 * Parameters: parentID, id.
 */
class RemoveGroupFromParentRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/group/remove-from-parent';
    }
}
