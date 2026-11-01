<?php

namespace spkm\FortiNac\Requests\Logging\EventAlarmMapping;

use spkm\FortiNac\Data\Logging\EventAlarmMapping;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all event to alarm mapping records which match the supplied filter: GET /logging/event-alarm-mapping.
 */
class GetEventAlarmMappingsRequest extends ListRequest
{
    protected ?string $dto = EventAlarmMapping::class;

    public function resolveEndpoint(): string
    {
        return '/logging/event-alarm-mapping';
    }
}
