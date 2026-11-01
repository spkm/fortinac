<?php

namespace spkm\FortiNac\Requests\System\ScheduledTask;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all scheduled task records in the database: GET /system/scheduler/count/all.
 */
class CountAllScheduledTasksRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/system/scheduler/count/all';
    }
}
