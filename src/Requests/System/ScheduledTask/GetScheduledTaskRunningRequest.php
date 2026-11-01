<?php

namespace spkm\FortiNac\Requests\System\ScheduledTask;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns if the provided scheduled task is currently running: GET /system/scheduler/{name}/running.
 */
class GetScheduledTaskRunningRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/system/scheduler/'.rawurlencode($this->name).'/running';
    }
}
