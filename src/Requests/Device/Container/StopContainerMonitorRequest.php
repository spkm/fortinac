<?php

namespace spkm\FortiNac\Requests\Device\Container;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Stop collecting changes made to Container records for the specified monitor: POST /device/container/monitor/{id}/stop.
 */
class StopContainerMonitorRequest extends ActionRequest
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
        return '/device/container/monitor/'.$this->id.'/stop';
    }
}
