<?php

namespace spkm\FortiNac\Resources\Policy;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Policy\SecurityEvent;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\SecurityEvent\GetSecurityEventMonitorRequest;
use spkm\FortiNac\Requests\Policy\SecurityEvent\GetSecurityEventRequest;
use spkm\FortiNac\Requests\Policy\SecurityEvent\GetSecurityEventsRequest;
use spkm\FortiNac\Requests\Policy\SecurityEvent\PostSecurityEventMonitorStopRequest;
use spkm\FortiNac\Requests\Policy\SecurityEvent\StartSecurityEventMonitorRequest;

/**
 * Security Event, from FortiNac::policy()->securityEvents().
 *
 * @extends Builder<SecurityEvent>
 */
class SecurityEventResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, SecurityEvent::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSecurityEventsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetSecurityEventRequest($this->intId($id));
    }

    /**
     * Gets all changes to Security Event records since the Events were last polled: GET /policy/security-event/{id}/monitor.
     */
    public function monitor(int $id): mixed
    {
        return $this->fetch(new GetSecurityEventMonitorRequest($id));
    }

    /**
     * Stops collecting changes made to Security Event records matching the supplied filter: POST /policy/security-event/{id}/monitor/stop.
     *
     * @param  array<string, mixed>  $options
     */
    public function monitorStop(int $id, array $options = []): bool
    {
        return $this->perform(new PostSecurityEventMonitorStopRequest($id, $options));
    }

    /**
     * Begins collecting changes made to Security Event records matching the supplied filter: POST /policy/security-event/monitor/start.
     *
     * @param  array<string, mixed>  $options
     * @return Collection<int, SecurityEvent>
     */
    public function startMonitor(array $options = []): Collection
    {
        return $this->fetch(new StartSecurityEventMonitorRequest($options));
    }
}
