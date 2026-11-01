<?php

namespace spkm\FortiNac\Requests\Logging\ConnectionLogEntry;

use spkm\FortiNac\Data\Logging\ConnectionLogEntry;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Network Session Event records which match the supplied filter, but only the first matching Network Session Event for each unique sessoin: GET /logging/connection/by-session.
 */
class GetConnectionLogEntryBySessionRequest extends ListRequest
{
    protected ?string $dto = ConnectionLogEntry::class;

    public function resolveEndpoint(): string
    {
        return '/logging/connection/by-session';
    }
}
