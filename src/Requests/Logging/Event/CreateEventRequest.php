<?php

namespace spkm\FortiNac\Requests\Logging\Event;

use spkm\FortiNac\Data\Logging\Event;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds a new event record to the database: POST /logging/event.
 */
class CreateEventRequest extends WriteRequest
{
    protected ?string $dto = Event::class;

    public function resolveEndpoint(): string
    {
        return '/logging/event';
    }
}
