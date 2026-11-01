<?php

namespace spkm\FortiNac\Requests\System\ScheduledTask;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the scheduled task record or records supplied, if they are none are currently in use: POST /system/scheduler/{id}/delete.
 */
class DeleteScheduledTaskViaPostRequest extends ActionRequest
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
        return '/system/scheduler/'.$this->id.'/delete';
    }
}
