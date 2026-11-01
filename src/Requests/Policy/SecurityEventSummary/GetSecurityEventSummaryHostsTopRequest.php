<?php

namespace spkm\FortiNac\Requests\Policy\SecurityEventSummary;

use spkm\FortiNac\Data\Policy\SecurityEventSummaryHostsTop;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the least or more frequently appearing Hosts associated with Security Events during the specified time range: GET /policy/security-event-summary/hosts/top.
 *
 * Parameters: startDate, endDate, minSev, maxSev, numResults, topEvents.
 */
class GetSecurityEventSummaryHostsTopRequest extends ItemRequest
{
    protected ?string $dto = SecurityEventSummaryHostsTop::class;

    /**
     * @param  array<string, mixed>  $options  Query options: startDate, endDate, minSev, maxSev, numResults, topEvents
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/policy/security-event-summary/hosts/top';
    }
}
