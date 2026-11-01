<?php

namespace spkm\FortiNac\Requests\System\Group;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the group record or records supplied, if they are not currently in use: POST /system/group/delete.
 *
 * Parameters: id.
 */
class DeleteManyGroupsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/group/delete';
    }
}
