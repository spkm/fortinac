<?php

namespace spkm\FortiNac\Requests\System\ScheduledTask;

use spkm\FortiNac\Data\System\ScheduledTaskActivityTypes;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the full set of activity types known to the scheduler: GET /system/scheduler/activity-types.
 */
class GetScheduledTaskActivityTypesRequest extends ItemRequest
{
    protected ?string $dto = ScheduledTaskActivityTypes::class;

    public function resolveEndpoint(): string
    {
        return '/system/scheduler/activity-types';
    }
}
