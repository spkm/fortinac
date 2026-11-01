<?php

namespace spkm\FortiNac\Requests\Policy\SecurityEventSummary;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Queries all Hosts which were previously disabled by a Security Alarm that has been undone: GET /policy/security-event-summary/hosts/remediated.
 *
 * Parameters: startDate, endDate.
 */
class GetSecurityEventSummaryHostsRemediatedRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    /**
     * @param  array<string, mixed>  $options  Query options: startDate, endDate
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/policy/security-event-summary/hosts/remediated';
    }
}
