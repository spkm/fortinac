<?php

namespace spkm\FortiNac\Requests\Logging\EventType;

use spkm\FortiNac\Data\Logging\EventType;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Event Type records which match the supplied filter: GET /logging/event-types.
 */
class GetEventTypesRequest extends ListRequest
{
    protected ?string $dto = EventType::class;

    public function resolveEndpoint(): string
    {
        return '/logging/event-types';
    }
}
