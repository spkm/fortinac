<?php

namespace spkm\FortiNac\Requests\System\ScheduledTask;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Runs one or more scheduled tasks with the supplied IDs: POST /system/scheduler/run.
 *
 * Parameters: id.
 */
class RunScheduledTaskRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/scheduler/run';
    }
}
