<?php

namespace spkm\FortiNac\Requests\Logging\Event;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Imports an event archive from filesystem back into the database: POST /logging/event/archive/import.
 *
 * Parameters: fileName.
 */
class PostEventArchiveImportRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/event/archive/import';
    }
}
