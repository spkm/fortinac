<?php

namespace spkm\FortiNac\Data\System;

use spkm\FortiNac\Data\Data;

/**
 * A HighAvailability record.
 */
readonly class HighAvailability extends Data
{
    /**
     * @param  array<mixed>|null  $ncm
     * @param  array<mixed>|null  $nas
     * @param  array<mixed>|null  $ncs
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $product = null,
        public ?array $ncm = null,
        public ?array $nas = null,
        public ?array $ncs = null,
        public ?bool $isNCM = null,
        public ?bool $isNAS = null,
        public ?bool $isNCS = null,
        public array $extra = [],
    ) {}
}
