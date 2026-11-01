<?php

namespace spkm\FortiNac\Requests\System\Debug;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the requested number of lines from the tail of one of the log files on the system: GET /system/debug/log.
 *
 * Parameters: logName, tailLog, lastKnownLogLength, LogLines, hostName, filter.
 */
class GetDebugLogRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: logName, tailLog, lastKnownLogLength, LogLines, hostName, filter
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/system/debug/log';
    }
}
