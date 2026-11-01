<?php

namespace spkm\FortiNac\Data\System;

use spkm\FortiNac\Data\Data;

/**
 * A DebugElementsAttribute record.
 */
readonly class DebugElementsAttribute extends Data
{
    /**
     * @param  array<mixed>|null  $value
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $version = null,
        public ?string $name = null,
        public ?array $value = null,
        public array $extra = [],
    ) {}
}
