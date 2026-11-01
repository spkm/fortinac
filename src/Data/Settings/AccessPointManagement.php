<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A AccessPointManagement record.
 */
readonly class AccessPointManagement extends Data
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
