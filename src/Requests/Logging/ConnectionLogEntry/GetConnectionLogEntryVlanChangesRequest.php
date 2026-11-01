<?php

namespace spkm\FortiNac\Requests\Logging\ConnectionLogEntry;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the number of unique Hosts that had access to each Logical Network: GET /logging/connection/vlan/changes.
 *
 * Parameters: filter.
 */
class GetConnectionLogEntryVlanChangesRequest extends ItemRequest
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
        return '/logging/connection/vlan/changes';
    }
}
