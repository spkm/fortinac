<?php

namespace spkm\FortiNac\Requests\System\HighAvailability;

use spkm\FortiNac\Data\System\HighAvailability;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Sets the high availability settings: POST /system/high-availability.
 */
class UpdateHighAvailabilityRequest extends WriteRequest
{
    protected ?string $dto = HighAvailability::class;

    public function resolveEndpoint(): string
    {
        return '/system/high-availability';
    }
}
