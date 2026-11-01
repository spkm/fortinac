<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A AgentPackage record.
 */
readonly class AgentPackage extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $name = null,
        public ?string $os = null,
        public ?string $size = null,
        public ?string $fileName = null,
        public ?string $packageName = null,
        public ?string $version = null,
        public array $extra = [],
    ) {}
}
