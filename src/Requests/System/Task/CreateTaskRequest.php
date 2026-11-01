<?php

namespace spkm\FortiNac\Requests\System\Task;

use spkm\FortiNac\Data\System\Task;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds a new task record to the database: POST /system/task.
 */
class CreateTaskRequest extends WriteRequest
{
    protected ?string $dto = Task::class;

    public function resolveEndpoint(): string
    {
        return '/system/task';
    }
}
