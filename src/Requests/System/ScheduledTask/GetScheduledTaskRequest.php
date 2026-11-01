<?php

namespace spkm\FortiNac\Requests\System\ScheduledTask;

use spkm\FortiNac\Data\System\ScheduledTask;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the scheduled task record with the supplied DBID: GET /system/scheduler/{id}.
 */
class GetScheduledTaskRequest extends ItemRequest
{
    protected ?string $dto = ScheduledTask::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/system/scheduler/'.$this->id;
    }
}
