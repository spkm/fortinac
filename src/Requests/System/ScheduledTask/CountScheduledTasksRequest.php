<?php

namespace spkm\FortiNac\Requests\System\ScheduledTask;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns a count of scheduled task records matching the supplied filter: GET /system/scheduler/count.
 */
class CountScheduledTasksRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/scheduler/count';
    }
}
