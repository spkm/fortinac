<?php

namespace spkm\FortiNac\Requests\System\Task;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all task records in the database: GET /system/task/count/all.
 */
class CountAllTasksRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/system/task/count/all';
    }
}
