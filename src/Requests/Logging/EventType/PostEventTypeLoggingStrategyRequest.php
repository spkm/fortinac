<?php

namespace spkm\FortiNac\Requests\Logging\EventType;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the logging strategy for one or more event types: POST /logging/event-types/logging-strategy.
 *
 * Parameters: id, logLevel.
 */
class PostEventTypeLoggingStrategyRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/event-types/logging-strategy';
    }
}
