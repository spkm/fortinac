<?php

namespace spkm\FortiNac\Requests\Policy\SecurityAlarm;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Stops collecting changes made to Security Alarms for the specified monitor: POST /policy/security-alarm/{id}/monitor/stop.
 */
class PostSecurityAlarmMonitorStopRequest extends ActionRequest
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
        return '/policy/security-alarm/'.$this->id.'/monitor/stop';
    }
}
