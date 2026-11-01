<?php

namespace spkm\FortiNac\Requests\System\Task;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of task records that reference this record: GET /system/task/{id}/usage.
 */
class GetTaskUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/system/task/'.$this->id.'/usage';
    }
}
