<?php

namespace spkm\FortiNac\Requests\Logging\Alarm;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the Alarm record or records supplied, if they are not currently in use: POST /logging/alarm/delete.
 *
 * Parameters: id.
 */
class DeleteManyAlarmsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/alarm/delete';
    }
}
