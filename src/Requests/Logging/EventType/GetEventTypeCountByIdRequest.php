<?php

namespace spkm\FortiNac\Requests\Logging\EventType;

use spkm\FortiNac\Data\Logging\EventType;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the Event Type record that matches the supplied DBID: GET /logging/event-types/count/{id}.
 */
class GetEventTypeCountByIdRequest extends ItemRequest
{
    protected ?string $dto = EventType::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/logging/event-types/count/'.$this->id;
    }
}
