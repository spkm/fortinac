<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A MacExclusion record.
 */
readonly class MacExclusion extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $startMac = null,
        public ?string $endMac = null,
        public ?int $dbid = null,
        public ?string $name = null,
        public array $extra = [],
    ) {}
}
