<?php

namespace spkm\FortiNac\Requests\System\Group;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the aging time for records in the group or groups: POST /system/group/aging.
 *
 * Parameters: id, daysValid, daysInactive.
 */
class PostGroupAgingRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/group/aging';
    }
}
