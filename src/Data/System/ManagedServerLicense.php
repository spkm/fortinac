<?php

namespace spkm\FortiNac\Data\System;

use spkm\FortiNac\Data\Data;

/**
 * A ManagedServerLicense record.
 */
readonly class ManagedServerLicense extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $name = null,
        public ?int $usagePercent = null,
        public ?int $usage = null,
        public ?string $host = null,
        public array $extra = [],
    ) {}
}
