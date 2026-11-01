<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A NatDetection record.
 */
readonly class NatDetection extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $startIP = null,
        public ?string $endIP = null,
        public ?int $dbid = null,
        public array $extra = [],
    ) {}
}
