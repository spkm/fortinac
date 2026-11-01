<?php

namespace spkm\FortiNac\Requests\System\Task;

use spkm\FortiNac\Data\System\Task;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns all task records with the supplied DBID: GET /system/task/{id}.
 */
class GetTaskRequest extends ItemRequest
{
    protected ?string $dto = Task::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/system/task/'.$this->id;
    }
}
