<?php

namespace spkm\FortiNac\Requests\Logging\Event;

use spkm\FortiNac\Data\Logging\Event;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all event records which match the supplied filter: GET /logging/event.
 */
class GetEventsRequest extends ListRequest
{
    protected ?string $dto = Event::class;

    public function resolveEndpoint(): string
    {
        return '/logging/event';
    }
}
