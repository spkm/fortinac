<?php

namespace spkm\FortiNac\Requests\Logging\EventType;

use spkm\FortiNac\Data\Logging\EventTypeThresholds;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the thresholds for several system events, such as CPU usage, before they are triggered: GET /logging/event-types/thresholds.
 */
class GetEventTypeThresholdsRequest extends ItemRequest
{
    protected ?string $dto = EventTypeThresholds::class;

    public function resolveEndpoint(): string
    {
        return '/logging/event-types/thresholds';
    }
}
