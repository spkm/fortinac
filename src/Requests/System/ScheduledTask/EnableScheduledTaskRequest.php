<?php

namespace spkm\FortiNac\Requests\System\ScheduledTask;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the supplied scheduled task: POST /system/scheduler/{id}/enable.
 */
class EnableScheduledTaskRequest extends ActionRequest
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
        return '/system/scheduler/'.$this->id.'/enable';
    }
}
