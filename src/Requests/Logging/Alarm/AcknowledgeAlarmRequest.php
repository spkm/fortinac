<?php

namespace spkm\FortiNac\Requests\Logging\Alarm;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Marks one or more alarms as Acknowledged, resolving any applied actions: POST /logging/alarm/acknowledge.
 *
 * Parameters: id.
 */
class AcknowledgeAlarmRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/alarm/acknowledge';
    }
}
