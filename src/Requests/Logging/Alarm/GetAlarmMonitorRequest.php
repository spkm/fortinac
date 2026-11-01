<?php

namespace spkm\FortiNac\Requests\Logging\Alarm;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Gets all changes to Alarm records since the Alarms were last polled: GET /logging/alarm/monitor/{id}.
 */
class GetAlarmMonitorRequest extends ItemRequest
{
    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/logging/alarm/monitor/'.$this->id;
    }
}
