<?php

namespace spkm\FortiNac\Requests\Logging\ConnectionLogEntry;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of Network Session Event records in the database: GET /logging/connection/count/all.
 */
class CountAllConnectionLogEntriesRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/logging/connection/count/all';
    }
}
