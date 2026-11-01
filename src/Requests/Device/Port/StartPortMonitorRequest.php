<?php

namespace spkm\FortiNac\Requests\Device\Port;

use spkm\FortiNac\Data\Device\Port;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Begins collecting changes made of Port records matching the supplied filter: POST /device/port/monitor/start.
 */
class StartPortMonitorRequest extends ActionRequest
{
    protected ?string $dto = Port::class;

    protected string $responseShape = self::LIST;

    public function resolveEndpoint(): string
    {
        return '/device/port/monitor/start';
    }
}
