<?php

namespace spkm\FortiNac\Requests\System\ScheduledTask;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the scheduled task record or records supplied, if they are none are currently in use: POST /system/scheduler/delete.
 *
 * Parameters: id.
 */
class DeleteManyScheduledTasksRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/scheduler/delete';
    }
}
