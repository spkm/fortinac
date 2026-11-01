<?php

namespace spkm\FortiNac\Requests\Logging\Alarm;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Stops collecting changes made to Alarm records for the specified monitor: POST /logging/alarm/monitor/{id}/stop.
 */
class StopAlarmMonitorRequest extends ActionRequest
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
        return '/logging/alarm/monitor/'.$this->id.'/stop';
    }
}
