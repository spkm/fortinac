<?php

namespace spkm\FortiNac\Requests\Logging\Event;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Gets all changes to event records since the Events were last polled: GET /logging/event/monitor/{id}.
 */
class GetEventMonitorRequest extends ItemRequest
{
    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/logging/event/monitor/'.$this->id;
    }
}
