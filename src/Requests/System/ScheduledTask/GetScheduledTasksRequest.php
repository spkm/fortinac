<?php

namespace spkm\FortiNac\Requests\System\ScheduledTask;

use spkm\FortiNac\Data\System\ScheduledTask;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all scheduled task records which match the supplied filter: GET /system/scheduler.
 */
class GetScheduledTasksRequest extends ListRequest
{
    protected ?string $dto = ScheduledTask::class;

    public function resolveEndpoint(): string
    {
        return '/system/scheduler';
    }
}
