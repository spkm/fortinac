<?php

namespace spkm\FortiNac\Requests\Logging\EventType;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns the count of all Event Type records that match the provided filter: GET /logging/event-types/count.
 */
class CountEventTypesRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/event-types/count';
    }
}
