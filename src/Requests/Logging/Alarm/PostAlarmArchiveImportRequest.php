<?php

namespace spkm\FortiNac\Requests\Logging\Alarm;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Imports an alarm archive from the file system back into the database: POST /logging/alarm/archive/import.
 */
class PostAlarmArchiveImportRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/alarm/archive/import';
    }
}
