<?php

namespace spkm\FortiNac\Requests\Device\Container;

use spkm\FortiNac\Data\Device\ContainerStartContainerMonitor;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Begins collecting changes made to Container records matching the supplied filter: POST /device/container/monitor/start.
 */
class StartContainerMonitorRequest extends WriteRequest
{
    protected ?string $dto = ContainerStartContainerMonitor::class;

    protected string $responseShape = self::LIST;

    public function resolveEndpoint(): string
    {
        return '/device/container/monitor/start';
    }
}
