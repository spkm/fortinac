<?php

namespace spkm\FortiNac\Requests\Logging\Alarm;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the names of all alarm archives currently on the system: GET /logging/alarm/archive.
 */
class GetAlarmArchiveRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/logging/alarm/archive';
    }
}
