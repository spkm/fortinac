<?php

namespace spkm\FortiNac\Resources\Policy;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Policy\SecurityAlarm;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\SecurityAlarm\GetSecurityAlarmMonitorRequest;
use spkm\FortiNac\Requests\Policy\SecurityAlarm\GetSecurityAlarmRequest;
use spkm\FortiNac\Requests\Policy\SecurityAlarm\GetSecurityAlarmsRequest;
use spkm\FortiNac\Requests\Policy\SecurityAlarm\PostSecurityAlarmMonitorStopRequest;
use spkm\FortiNac\Requests\Policy\SecurityAlarm\StartSecurityAlarmMonitorRequest;

/**
 * Security Event, from FortiNac::policy()->securityAlarms().
 *
 * @extends Builder<SecurityAlarm>
 */
class SecurityAlarmResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, SecurityAlarm::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSecurityAlarmsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetSecurityAlarmRequest($this->intId($id));
    }

    /**
     * Gets all changes to Security Alarms since the alarms were last polled: GET /policy/security-alarm/{id}/monitor.
     */
    public function monitor(int $id): mixed
    {
        return $this->fetch(new GetSecurityAlarmMonitorRequest($id));
    }

    /**
     * Begins collecting changes made to Security Alarms matching the supplied filter: POST /policy/security-alarm/monitor/start.
     *
     * @param  array<string, mixed>  $options
     * @return Collection<int, SecurityAlarm>
     */
    public function startMonitor(array $options = []): Collection
    {
        return $this->fetch(new StartSecurityAlarmMonitorRequest($options));
    }

    /**
     * Stops collecting changes made to Security Alarms for the specified monitor: POST /policy/security-alarm/{id}/monitor/stop.
     *
     * @param  array<string, mixed>  $options
     */
    public function monitorStop(int $id, array $options = []): bool
    {
        return $this->perform(new PostSecurityAlarmMonitorStopRequest($id, $options));
    }
}
