<?php

namespace spkm\FortiNac\Requests\System\ScheduledTask;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes the scheduled task record supplied, if it is not currently in use: DELETE /system/scheduler/{id}.
 */
class DeleteScheduledTaskRequest extends DeleteRequest
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
        return '/system/scheduler/'.$this->id;
    }
}
