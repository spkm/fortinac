<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A TlsServiceConfigurationAliases record.
 */
readonly class TlsServiceConfigurationAliases extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $radsec = null,
        public ?string $agent = null,
        public ?string $tomcat = null,
        public ?string $radius = null,
        public ?string $portal = null,
        public array $extra = [],
    ) {}
}
