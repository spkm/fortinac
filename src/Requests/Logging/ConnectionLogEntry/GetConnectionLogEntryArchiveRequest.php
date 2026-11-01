<?php

namespace spkm\FortiNac\Requests\Logging\ConnectionLogEntry;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the name of all connection log archives currently on the system: GET /logging/connection/archive.
 */
class GetConnectionLogEntryArchiveRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/logging/connection/archive';
    }
}
