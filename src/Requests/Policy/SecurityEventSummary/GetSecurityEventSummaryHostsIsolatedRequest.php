<?php

namespace spkm\FortiNac\Requests\Policy\SecurityEventSummary;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Queries all Hosts which have an active Disabling action from a Security Alarm: GET /policy/security-event-summary/hosts/isolated.
 *
 * Parameters: startDate, endDate.
 */
class GetSecurityEventSummaryHostsIsolatedRequest extends ItemRequest
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
        return '/policy/security-event-summary/hosts/isolated';
    }
}
