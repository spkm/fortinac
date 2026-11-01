<?php

namespace spkm\FortiNac\Requests\Device\Port;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Stops collecting changes made of Port records matching the supplied filter: POST /device/port/monitor/{id}/stop.
 */
class StopPortMonitorRequest extends ActionRequest
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
        return '/device/port/monitor/'.$this->id.'/stop';
    }
}
