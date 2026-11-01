<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A AllowedDomains record.
 */
readonly class AllowedDomains extends Data
{
    /**
     * @param  array<mixed>|null  $domains
     * @param  array<mixed>|null  $reservedDomains
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $ipAddress = null,
        public ?string $proxyAutoConfig = null,
        public ?bool $factoryDefaults = null,
        public ?bool $forwardOnly = null,
        public ?array $domains = null,
        public ?array $reservedDomains = null,
        public array $extra = [],
    ) {}
}
