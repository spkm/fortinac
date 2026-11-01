<?php

namespace spkm\FortiNac\Data\User;

use spkm\FortiNac\Data\Data;

/**
 * A DashboardDeviceSummaryDeviceByStatus record.
 */
readonly class DashboardDeviceSummaryDeviceByStatus extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $deviceID = null,
        public ?int $objectID = null,
        public ?string $deviceName = null,
        public ?string $description = null,
        public ?string $type = null,
        public array $extra = [],
    ) {}
}
