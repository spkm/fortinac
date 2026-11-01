<?php

namespace spkm\FortiNac\Data\Dynamic;

use spkm\FortiNac\Data\Data;

/**
 * A FirewallSessionPollingById record.
 */
readonly class FirewallSessionPollingById extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $status = null,
        public ?string $errorMessage = null,
        public ?bool $enabled = null,
        public ?int $frequency = null,
        public ?bool $createRogues = null,
        public array $extra = [],
    ) {}
}
