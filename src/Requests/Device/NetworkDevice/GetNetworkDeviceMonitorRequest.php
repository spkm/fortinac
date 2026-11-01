<?php

namespace spkm\FortiNac\Requests\Device\NetworkDevice;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Gets all changes to Network Device records since the Events were last polled: GET /device/monitor/{id}.
 */
class GetNetworkDeviceMonitorRequest extends ItemRequest
{
    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/device/monitor/'.$this->id;
    }
}
