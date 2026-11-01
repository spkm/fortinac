<?php

namespace spkm\FortiNac\Requests\System\Task;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Updates an existing task record in the database: DELETE /system/task/{id}.
 */
class DeleteTaskRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/system/task/'.$this->id;
    }
}
