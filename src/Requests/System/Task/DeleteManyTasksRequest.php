<?php

namespace spkm\FortiNac\Requests\System\Task;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the task record or records supplied, if they are not currently in use: POST /system/task/delete.
 *
 * Parameters: id.
 */
class DeleteManyTasksRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/task/delete';
    }
}
