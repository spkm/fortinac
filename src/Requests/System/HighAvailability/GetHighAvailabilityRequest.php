<?php

namespace spkm\FortiNac\Requests\System\HighAvailability;

use spkm\FortiNac\Data\System\HighAvailability;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the currently configured high availability settings: GET /system/high-availability.
 */
class GetHighAvailabilityRequest extends ItemRequest
{
    protected ?string $dto = HighAvailability::class;

    public function resolveEndpoint(): string
    {
        return '/system/high-availability';
    }
}
