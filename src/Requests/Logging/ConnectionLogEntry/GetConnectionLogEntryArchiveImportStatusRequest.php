<?php

namespace spkm\FortiNac\Requests\Logging\ConnectionLogEntry;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the status of the most recent connection log archive import: GET /logging/connection/archive/import/status.
 */
class GetConnectionLogEntryArchiveImportStatusRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/logging/connection/archive/import/status';
    }
}
