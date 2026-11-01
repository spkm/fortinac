<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A Quarantine record.
 */
readonly class Quarantine extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $quarantineVlanSwitching = null,
        public array $extra = [],
    ) {}
}
