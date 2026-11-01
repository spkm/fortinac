<?php

namespace spkm\FortiNac\Requests\Device\Container;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Get all changes to Container records since the Events were last polled: GET /device/container/monitor/{id}.
 */
class GetContainerMonitorRequest extends ItemRequest
{
    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/device/container/monitor/'.$this->id;
    }
}
