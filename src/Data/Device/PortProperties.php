<?php

namespace spkm\FortiNac\Data\Device;

use spkm\FortiNac\Data\Data;

/**
 * A PortProperties record.
 */
readonly class PortProperties extends Data
{
    /**
     * @param  array<mixed>|null  $ids
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?array $ids = null,
        public ?string $name = null,
        public ?bool $adminStatus = null,
        public ?string $defaultVlan = null,
        public ?string $currentVlan = null,
        public ?int $newUplink = null,
        public ?bool $clearUplink = null,
        public ?string $note = null,
        public array $extra = [],
    ) {}
}
