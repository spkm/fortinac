<?php

namespace spkm\FortiNac\Requests\Logging\Alarm;

use spkm\FortiNac\Data\Logging\AlarmStartAlarmMonitor;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Begins collecting changes made to Alarm records matching the supplied filter: POST /logging/alarm/monitor/start.
 */
class StartAlarmMonitorRequest extends ActionRequest
{
    protected ?string $dto = AlarmStartAlarmMonitor::class;

    protected string $responseShape = self::LIST;

    public function resolveEndpoint(): string
    {
        return '/logging/alarm/monitor/start';
    }
}
