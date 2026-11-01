<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A RogueDhcpDetection record.
 */
readonly class RogueDhcpDetection extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $dhcpInterface = null,
        public array $extra = [],
    ) {}
}
