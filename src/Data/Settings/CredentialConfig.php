<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A CredentialConfig record.
 */
readonly class CredentialConfig extends Data
{
    /**
     * @param  array<mixed>|null  $allAuthTypes
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?array $allAuthTypes = null,
        public ?string $regAsDevice = null,
        public ?string $authTypeAgent = null,
        public ?string $regTypeAgent = null,
        public ?string $regEnabled = null,
        public array $extra = [],
    ) {}
}
