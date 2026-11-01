<?php

namespace spkm\FortiNac\Requests\Logging\Event;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the event record or records that match the supplied DBID(s), if they are not currently in use: POST /logging/event/delete.
 *
 * Parameters: id.
 */
class DeleteManyEventsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/event/delete';
    }
}
