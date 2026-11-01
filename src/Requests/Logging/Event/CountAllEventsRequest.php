<?php

namespace spkm\FortiNac\Requests\Logging\Event;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a count of all event records that match the provided filter: GET /logging/event/count/all.
 */
class CountAllEventsRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/logging/event/count/all';
    }
}
