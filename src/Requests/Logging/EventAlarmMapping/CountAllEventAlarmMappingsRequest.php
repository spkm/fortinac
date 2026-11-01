<?php

namespace spkm\FortiNac\Requests\Logging\EventAlarmMapping;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all event to alarm mapping records in the database: GET /logging/event-alarm-mapping/count/all.
 */
class CountAllEventAlarmMappingsRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/logging/event-alarm-mapping/count/all';
    }
}
