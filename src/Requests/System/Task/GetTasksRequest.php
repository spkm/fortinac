<?php

namespace spkm\FortiNac\Requests\System\Task;

use spkm\FortiNac\Data\System\Task;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all task records which match the supplied fitler: GET /system/task.
 */
class GetTasksRequest extends ListRequest
{
    protected ?string $dto = Task::class;

    public function resolveEndpoint(): string
    {
        return '/system/task';
    }
}
