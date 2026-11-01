<?php

namespace spkm\FortiNac\Requests\Policy\SecurityEventSummary;

use spkm\FortiNac\Data\Policy\SecurityEventSummaryEventsTop;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the least or most frequently appearing Security Events as determined by Event Description during the specified time range: GET /policy/security-event-summary/events/top.
 *
 * Parameters: startDate, endDate, minSev, maxSev, numResults, topEvents.
 */
class GetSecurityEventSummaryEventsTopRequest extends ItemRequest
{
    protected ?string $dto = SecurityEventSummaryEventsTop::class;

    /**
     * @param  array<string, mixed>  $options  Query options: startDate, endDate, minSev, maxSev, numResults, topEvents
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/policy/security-event-summary/events/top';
    }
}
