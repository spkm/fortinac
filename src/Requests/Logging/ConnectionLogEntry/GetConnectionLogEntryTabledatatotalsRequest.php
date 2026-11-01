<?php

namespace spkm\FortiNac\Requests\Logging\ConnectionLogEntry;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the Table Data Totals for Network Session Events: GET /logging/connection/tabledatatotals.
 *
 * Parameters: filter.
 */
class GetConnectionLogEntryTabledatatotalsRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: filter
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/logging/connection/tabledatatotals';
    }
}
