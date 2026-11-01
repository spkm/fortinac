<?php

namespace spkm\FortiNac\Requests\Logging\EventAlarmMapping;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the event to alarm mapping record that matches the supplied id, if it is not currently in use: POST /logging/event-alarm-mapping/{id}/delete.
 */
class DeleteEventAlarmMappingViaPostRequest extends ActionRequest
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
        return '/logging/event-alarm-mapping/'.$this->id.'/delete';
    }
}
