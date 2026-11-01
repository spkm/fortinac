<?php

namespace spkm\FortiNac\Requests\System\Task;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns a count of all task records that match the filter specification: GET /system/task/count.
 */
class CountTasksRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/task/count';
    }
}
