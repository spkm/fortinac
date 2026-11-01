<?php

namespace spkm\FortiNac\Requests\Logging\EventAlarmMapping;

use spkm\FortiNac\Data\Logging\EventAlarmMapping;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the event to alarm mapping record that matches the supplied DBID: GET /logging/event-alarm-mapping/{id}.
 */
class GetEventAlarmMappingRequest extends ItemRequest
{
    protected ?string $dto = EventAlarmMapping::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/logging/event-alarm-mapping/'.$this->id;
    }
}
