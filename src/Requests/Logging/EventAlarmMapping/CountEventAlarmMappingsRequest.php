<?php

namespace spkm\FortiNac\Requests\Logging\EventAlarmMapping;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns the count of all event to alarm mapping records that match the provided filter: GET /logging/event-alarm-mapping/count.
 */
class CountEventAlarmMappingsRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/event-alarm-mapping/count';
    }
}
