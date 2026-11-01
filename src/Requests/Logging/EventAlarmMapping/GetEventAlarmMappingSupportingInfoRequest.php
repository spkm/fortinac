<?php

namespace spkm\FortiNac\Requests\Logging\EventAlarmMapping;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns information needed to create an Event to Alarm mapping, such as the list of possible events: GET /logging/event-alarm-mapping/supporting-info.
 */
class GetEventAlarmMappingSupportingInfoRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/event-alarm-mapping/supporting-info';
    }
}
