<?php

namespace spkm\FortiNac\Requests\Logging\EventType;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the targeted group for one or more event types: POST /logging/event-types/group.
 *
 * Parameters: id, groupID.
 */
class PostEventTypeGroupRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/event-types/group';
    }
}
