<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A DeviceProfilerSettings record.
 */
readonly class DeviceProfilerSettings extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $createRogues = null,
        public ?string $disablePing = null,
        public ?string $collectUrl = null,
        public ?string $queryUrl = null,
        public ?bool $isUsg = null,
        public ?string $passiveIotEnabled = null,
        public ?string $passiveNmapEnabled = null,
        public ?string $collectEnabled = null,
        public ?string $enabled = null,
        public array $extra = [],
    ) {}
}
