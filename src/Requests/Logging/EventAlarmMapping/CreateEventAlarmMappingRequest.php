<?php

namespace spkm\FortiNac\Requests\Logging\EventAlarmMapping;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Returns all event to alarm mapping records which match the supplied filter: POST /logging/event-alarm-mapping.
 */
class CreateEventAlarmMappingRequest extends WriteRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/logging/event-alarm-mapping';
    }
}
