<?php

namespace spkm\FortiNac\Data\User;

use spkm\FortiNac\Data\Data;

/**
 * A DashboardDeviceSummary record.
 */
readonly class DashboardDeviceSummary extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $name = null,
        public ?string $tag = null,
        public ?string $onlineIcon = null,
        public ?string $offlineIcon = null,
        public ?int $onlineCount = null,
        public ?int $offlineCount = null,
        public array $extra = [],
    ) {}
}
