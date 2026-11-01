<?php

namespace spkm\FortiNac\Requests\System\BackgroundTask;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the Background Task record or records supplied: POST /system/background-task/delete.
 *
 * Parameters: id.
 */
class DeleteManyBackgroundTasksRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/background-task/delete';
    }
}
