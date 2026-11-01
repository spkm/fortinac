<?php

namespace spkm\FortiNac\Requests\Policy\SecurityEventSummary;

use spkm\FortiNac\Data\Policy\SecurityEventSummaryAlarmsTop;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the least or more frequently appearing Alarms as determined by the Rule Text during the specified time range: GET /policy/security-event-summary/alarms/top.
 *
 * Parameters: startDate, endDate, numResults.
 */
class GetSecurityEventSummaryAlarmsTopRequest extends ItemRequest
{
    protected ?string $dto = SecurityEventSummaryAlarmsTop::class;

    /**
     * @param  array<string, mixed>  $options  Query options: startDate, endDate, numResults
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/policy/security-event-summary/alarms/top';
    }
}
