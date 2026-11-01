<?php

namespace spkm\FortiNac\Resources\Policy;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Policy\SecurityEventSummaryAlarmsTop;
use spkm\FortiNac\Data\Policy\SecurityEventSummaryEventsTop;
use spkm\FortiNac\Data\Policy\SecurityEventSummaryHostsTop;
use spkm\FortiNac\Data\Policy\SecurityEventSummaryStatistics;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\Policy\SecurityEventSummary\GetSecurityEventSummaryAlarmsTopRequest;
use spkm\FortiNac\Requests\Policy\SecurityEventSummary\GetSecurityEventSummaryDashSecurityHostsForAlarmRequest;
use spkm\FortiNac\Requests\Policy\SecurityEventSummary\GetSecurityEventSummaryEventsTopRequest;
use spkm\FortiNac\Requests\Policy\SecurityEventSummary\GetSecurityEventSummaryHostsIsolatedRequest;
use spkm\FortiNac\Requests\Policy\SecurityEventSummary\GetSecurityEventSummaryHostsRemediatedRequest;
use spkm\FortiNac\Requests\Policy\SecurityEventSummary\GetSecurityEventSummaryHostsTopRequest;
use spkm\FortiNac\Requests\Policy\SecurityEventSummary\GetSecurityEventSummaryStatisticsRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Security Event, from FortiNac::policy()->securityEventSummary().
 *
 * @extends BaseResource<Data>
 */
class SecurityEventSummaryResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Queries all Hosts which have an active Disabling action from a Security Alarm: GET /policy/security-event-summary/hosts/isolated.
     *
     * @param  array<string, mixed>  $options  Query options: startDate, endDate
     */
    public function hostsIsolated(array $options = []): mixed
    {
        return $this->fetch(new GetSecurityEventSummaryHostsIsolatedRequest($options));
    }

    /**
     * Returns the least or more frequently appearing Alarms as determined by the Rule Text during the specified time range: GET /policy/security-event-summary/alarms/top.
     *
     * @param  array<string, mixed>  $options  Query options: startDate, endDate, numResults
     */
    public function alarmsTop(array $options = []): ?SecurityEventSummaryAlarmsTop
    {
        return $this->fetchOrNull(new GetSecurityEventSummaryAlarmsTopRequest($options));
    }

    /**
     * Returns the least or most frequently appearing Security Events as determined by Event Description during the specified time range: GET /policy/security-event-summary/events/top.
     *
     * @param  array<string, mixed>  $options  Query options: startDate, endDate, minSev, maxSev, numResults, topEvents
     */
    public function eventsTop(array $options = []): ?SecurityEventSummaryEventsTop
    {
        return $this->fetchOrNull(new GetSecurityEventSummaryEventsTopRequest($options));
    }

    /**
     * Returns a list of hosts that generated the provided alarm for the specified date range: GET /policy/security-event-summary/dash-security-hosts-for-alarm.
     *
     * @param  array<string, mixed>  $options  Query options: startDate, endDate, ruleName
     */
    public function dashSecurityHostsForAlarm(array $options = []): mixed
    {
        return $this->fetch(new GetSecurityEventSummaryDashSecurityHostsForAlarmRequest($options));
    }

    /**
     * Returns the least or more frequently appearing Hosts associated with Security Events during the specified time range: GET /policy/security-event-summary/hosts/top.
     *
     * @param  array<string, mixed>  $options  Query options: startDate, endDate, minSev, maxSev, numResults, topEvents
     */
    public function hostsTop(array $options = []): ?SecurityEventSummaryHostsTop
    {
        return $this->fetchOrNull(new GetSecurityEventSummaryHostsTopRequest($options));
    }

    /**
     * Queries all Hosts which were previously disabled by a Security Alarm that has been undone: GET /policy/security-event-summary/hosts/remediated.
     *
     * @param  array<string, mixed>  $options  Query options: startDate, endDate
     */
    public function hostsRemediated(array $options = []): mixed
    {
        return $this->fetch(new GetSecurityEventSummaryHostsRemediatedRequest($options));
    }

    /**
     * Retrieves overall statistics about Security Events, Security Alarms, and the associated Hosts: GET /policy/security-event-summary/statistics.
     *
     * @param  array<string, mixed>  $options  Query options: startDate, endDate
     */
    public function statistics(array $options = []): ?SecurityEventSummaryStatistics
    {
        return $this->fetchOrNull(new GetSecurityEventSummaryStatisticsRequest($options));
    }
}
