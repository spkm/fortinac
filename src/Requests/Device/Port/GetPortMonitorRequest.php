<?php

namespace spkm\FortiNac\Requests\Device\Port;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Gets all changes to Port records since they were last polled: GET /device/port/monitor/{id}.
 */
class GetPortMonitorRequest extends ItemRequest
{
    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/device/port/monitor/'.$this->id;
    }
}
