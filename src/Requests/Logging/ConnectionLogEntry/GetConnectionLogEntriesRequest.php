<?php

namespace spkm\FortiNac\Requests\Logging\ConnectionLogEntry;

use spkm\FortiNac\Data\Logging\ConnectionLogEntry;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Network Session Event records which match the supplied filter: GET /logging/connection.
 */
class GetConnectionLogEntriesRequest extends ListRequest
{
    protected ?string $dto = ConnectionLogEntry::class;

    public function resolveEndpoint(): string
    {
        return '/logging/connection';
    }
}
