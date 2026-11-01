<?php

namespace spkm\FortiNac\Requests\Policy\SecurityAlarm;

use spkm\FortiNac\Data\Policy\SecurityAlarm;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Security Alarm records matching the supplied filter: GET /policy/security-alarm.
 */
class GetSecurityAlarmsRequest extends ListRequest
{
    protected ?string $dto = SecurityAlarm::class;

    public function resolveEndpoint(): string
    {
        return '/policy/security-alarm';
    }
}
