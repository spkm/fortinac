<?php

namespace spkm\FortiNac\Requests\Logging\Alarm;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the status of the most recent alarm archive import: GET /logging/alarm/archive/import/status.
 */
class GetAlarmArchiveImportStatusRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/logging/alarm/archive/import/status';
    }
}
