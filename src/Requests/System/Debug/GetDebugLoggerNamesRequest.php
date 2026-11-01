<?php

namespace spkm\FortiNac\Requests\System\Debug;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the current list of loggers defined for the system: GET /system/debug/logger-names.
 */
class GetDebugLoggerNamesRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/system/debug/logger-names';
    }
}
