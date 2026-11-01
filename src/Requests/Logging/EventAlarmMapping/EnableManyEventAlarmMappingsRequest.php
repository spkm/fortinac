<?php

namespace spkm\FortiNac\Requests\Logging\EventAlarmMapping;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the supplied event to alarm mapping: POST /logging/event-alarm-mapping/enable.
 *
 * Parameters: id.
 */
class EnableManyEventAlarmMappingsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/event-alarm-mapping/enable';
    }
}
