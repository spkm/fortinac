<?php

namespace spkm\FortiNac\Data\Settings;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A PatchManagement record.
 */
readonly class PatchManagement extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $type = null,
        public ?string $ip = null,
        public ?string $status = null,
        public ?CarbonImmutable $pollingInterval = null,
        public ?string $img = null,
        public array $extra = [],
    ) {}
}
