<?php

namespace spkm\FortiNac\Requests\Logging\EventType;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all Event Type records in the database: GET /logging/event-types/count/all.
 */
class CountAllEventTypesRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/logging/event-types/count/all';
    }
}
