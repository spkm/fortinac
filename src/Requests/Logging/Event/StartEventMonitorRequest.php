<?php

namespace spkm\FortiNac\Requests\Logging\Event;

use spkm\FortiNac\Data\Logging\Event;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Begins collecting changes made to event records matching the supplied filter: POST /logging/event/monitor/start.
 */
class StartEventMonitorRequest extends ActionRequest
{
    protected ?string $dto = Event::class;

    protected string $responseShape = self::LIST;

    public function resolveEndpoint(): string
    {
        return '/logging/event/monitor/start';
    }
}
