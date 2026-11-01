<?php

namespace spkm\FortiNac\Requests\Logging\EventType;

use spkm\FortiNac\Data\Logging\EventTypeThresholds;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Sets the thresholds for generating system events: POST /logging/event-types/thresholds.
 */
class PostEventTypeThresholdsRequest extends WriteRequest
{
    protected ?string $dto = EventTypeThresholds::class;

    public function resolveEndpoint(): string
    {
        return '/logging/event-types/thresholds';
    }
}
