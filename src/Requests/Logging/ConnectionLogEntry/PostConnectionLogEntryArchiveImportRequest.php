<?php

namespace spkm\FortiNac\Requests\Logging\ConnectionLogEntry;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Imports a collection log archive from the filesystem back into the database: POST /logging/connection/archive/import.
 *
 * Parameters: fileName.
 */
class PostConnectionLogEntryArchiveImportRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/connection/archive/import';
    }
}
