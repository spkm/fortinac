<?php

namespace spkm\FortiNac\Requests\Logging\Event;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns a count of all event records that match the provided filter: GET /logging/event/count.
 */
class CountEventsRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/event/count';
    }
}
