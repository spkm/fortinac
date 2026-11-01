<?php

namespace spkm\FortiNac\Requests\Logging\Event;

use spkm\FortiNac\Data\Logging\Event;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the event record that matched the supplied DBID: GET /logging/event/{id}.
 */
class GetEventRequest extends ItemRequest
{
    protected ?string $dto = Event::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/logging/event/'.$this->id;
    }
}
