<?php

namespace spkm\FortiNac\Requests\System\Group;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Creates a copy of the given group with the specified name: POST /system/group/copy.
 *
 * Parameters: id.
 */
class CopyGroupRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/group/copy';
    }
}
