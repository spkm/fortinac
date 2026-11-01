<?php

namespace spkm\FortiNac\Requests\Policy\SecurityAlarm;

use spkm\FortiNac\Data\Policy\SecurityAlarm;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Begins collecting changes made to Security Alarms matching the supplied filter: POST /policy/security-alarm/monitor/start.
 */
class StartSecurityAlarmMonitorRequest extends ActionRequest
{
    protected ?string $dto = SecurityAlarm::class;

    protected string $responseShape = self::LIST;

    public function resolveEndpoint(): string
    {
        return '/policy/security-alarm/monitor/start';
    }
}
