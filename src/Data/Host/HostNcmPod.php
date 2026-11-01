<?php

namespace spkm\FortiNac\Data\Host;

use spkm\FortiNac\Data\Data;

/**
 * A HostNcmPod record.
 */
readonly class HostNcmPod extends Data
{
    /**
     * @param  array<mixed>|null  $element
     * @param  array<mixed>|null  $domains
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?array $element = null,
        public ?array $domains = null,
        public ?string $port = null,
        public ?string $ip = null,
        public ?string $name = null,
        public array $extra = [],
    ) {}
}
