<?php

namespace spkm\FortiNac\Requests\Device\NetworkDevice;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Stops collecting changes made to Network Device records for the specified monitor: POST /device/monitor/{id}/stop.
 */
class StopNetworkDeviceMonitorRequest extends ActionRequest
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
        return '/device/monitor/'.$this->id.'/stop';
    }
}
