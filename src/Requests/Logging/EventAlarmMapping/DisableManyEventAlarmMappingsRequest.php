<?php

namespace spkm\FortiNac\Requests\Logging\EventAlarmMapping;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Disables the supplied event to alarm mapping: POST /logging/event-alarm-mapping/disable.
 *
 * Parameters: id.
 */
class DisableManyEventAlarmMappingsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/event-alarm-mapping/disable';
    }
}
