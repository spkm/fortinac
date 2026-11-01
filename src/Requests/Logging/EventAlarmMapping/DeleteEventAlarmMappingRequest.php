<?php

namespace spkm\FortiNac\Requests\Logging\EventAlarmMapping;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes the event to alarm mapping record that matches the supplied id, if it is not currently in use: DELETE /logging/event-alarm-mapping/{id}.
 */
class DeleteEventAlarmMappingRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/logging/event-alarm-mapping/'.$this->id;
    }
}
