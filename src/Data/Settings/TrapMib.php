<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A TrapMib record.
 */
readonly class TrapMib extends Data
{
    /**
     * @param  array<mixed>|null  $children
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $name = null,
        public ?array $children = null,
        public array $extra = [],
    ) {}
}
