<?php

namespace spkm\FortiNac\Data\Ssid;

use spkm\FortiNac\Data\Data;

/**
 * A SsidConfig record.
 */
readonly class SsidConfig extends Data
{
    /**
     * @param  array<mixed>|null  $radiusConfig
     * @param  array<mixed>|null  $networkAccessConfig
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $status = null,
        public ?string $errorMessage = null,
        public ?int $ssidId = null,
        public ?array $radiusConfig = null,
        public ?array $networkAccessConfig = null,
        public ?bool $dot1xAutoRegister = null,
        public ?bool $supportsVirtualization = null,
        public ?string $devModelConfigJSP = null,
        public array $extra = [],
    ) {}
}
