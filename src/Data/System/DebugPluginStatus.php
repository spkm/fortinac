<?php

namespace spkm\FortiNac\Data\System;

use spkm\FortiNac\Data\Data;

/**
 * A DebugPluginStatus record.
 */
readonly class DebugPluginStatus extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $name = null,
        public ?string $loader = null,
        public ?bool $debugEnabled = null,
        public array $extra = [],
    ) {}
}
