<?php

namespace spkm\FortiNac\Requests\Policy\SecurityEventSummary;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of hosts that generated the provided alarm for the specified date range: GET /policy/security-event-summary/dash-security-hosts-for-alarm.
 *
 * Parameters: startDate, endDate, ruleName.
 */
class GetSecurityEventSummaryDashSecurityHostsForAlarmRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    /**
     * @param  array<string, mixed>  $options  Query options: startDate, endDate, ruleName
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/policy/security-event-summary/dash-security-hosts-for-alarm';
    }
}
