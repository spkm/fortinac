<?php

namespace spkm\FortiNac\Requests\Logging\Event;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Stops collecting changes made to event records for the specified monitor: POST /logging/event/monitor/{id}/stop.
 */
class StopEventMonitorRequest extends ActionRequest
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
        return '/logging/event/monitor/'.$this->id.'/stop';
    }
}
