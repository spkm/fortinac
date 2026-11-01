<?php

namespace spkm\FortiNac\Data\Host;

use spkm\FortiNac\Data\Data;

/**
 * A HostDeviceType record.
 */
readonly class HostDeviceType extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $tag = null,
        public ?string $smIcon = null,
        public ?string $lgIcon = null,
        public ?bool $isDefault = null,
        public array $extra = [],
    ) {}
}
