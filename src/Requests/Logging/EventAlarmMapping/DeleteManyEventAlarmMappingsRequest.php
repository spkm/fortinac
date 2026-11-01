<?php

namespace spkm\FortiNac\Requests\Logging\EventAlarmMapping;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the event to alarm mapping record or records matching the supplied id(s), if they are none are currently in use: POST /logging/event-alarm-mapping/delete.
 *
 * Parameters: id.
 */
class DeleteManyEventAlarmMappingsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/event-alarm-mapping/delete';
    }
}
