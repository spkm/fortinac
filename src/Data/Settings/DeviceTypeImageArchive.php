<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A DeviceTypeImageArchive record.
 */
readonly class DeviceTypeImageArchive extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $name = null,
        public ?string $filename = null,
        public ?int $getxOffset = null,
        public ?int $getyOffset = null,
        public array $extra = [],
    ) {}
}
