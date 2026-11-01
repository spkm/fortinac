<?php

namespace spkm\FortiNac\Requests\Policy\SecurityEventSummary;

use spkm\FortiNac\Data\Policy\SecurityEventSummaryStatistics;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Retrieves overall statistics about Security Events, Security Alarms, and the associated Hosts: GET /policy/security-event-summary/statistics.
 *
 * Parameters: startDate, endDate.
 */
class GetSecurityEventSummaryStatisticsRequest extends ItemRequest
{
    protected ?string $dto = SecurityEventSummaryStatistics::class;

    /**
     * @param  array<string, mixed>  $options  Query options: startDate, endDate
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/policy/security-event-summary/statistics';
    }
}
