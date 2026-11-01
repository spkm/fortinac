<?php

namespace spkm\FortiNac\Data\Logging;

use spkm\FortiNac\Data\Data;

/**
 * A EventTypeThresholds record.
 */
readonly class EventTypeThresholds extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $masterProcessThreadCountWarning = null,
        public ?string $nessusProcessMemoryFreeCritical = null,
        public ?string $nessusProcessThreadCountCritical = null,
        public ?string $nessusProcessThreadCountWarning = null,
        public ?string $masterProcessMemoryFreeWarning = null,
        public ?string $masterProcessMemoryFreeCritical = null,
        public ?string $nessusProcessMemoryFreeWarning = null,
        public ?string $masterProcessThreadCountCritical = null,
        public ?string $concurrentLicenseLimitWarning = null,
        public ?string $concurrentLicenseLimitCritical = null,
        public ?string $diskFreeWarning = null,
        public ?string $diskFreeCritical = null,
        public ?string $memoryFreeWarning = null,
        public ?string $memoryFreeCritical = null,
        public ?string $networkTopologySizeWarning = null,
        public ?string $networkTopologySizeCritical = null,
        public array $extra = [],
    ) {}
}
