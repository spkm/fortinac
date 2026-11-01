<?php

namespace spkm\FortiNac\Requests\Policy\SecurityAlarm;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Gets all changes to Security Alarms since the alarms were last polled: GET /policy/security-alarm/{id}/monitor.
 */
class GetSecurityAlarmMonitorRequest extends ItemRequest
{
    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/security-alarm/'.$this->id.'/monitor';
    }
}
