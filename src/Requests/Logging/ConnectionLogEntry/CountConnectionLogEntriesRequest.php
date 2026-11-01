<?php

namespace spkm\FortiNac\Requests\Logging\ConnectionLogEntry;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns the count of Network Session Event records specified by the provided filter: GET /logging/connection/count.
 */
class CountConnectionLogEntriesRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/connection/count';
    }
}
