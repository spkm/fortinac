<?php

namespace spkm\FortiNac\Data\Portal;

use spkm\FortiNac\Data\Data;

/**
 * A PortalSslSettings record.
 */
readonly class PortalSslSettings extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $fqHostname = null,
        public ?string $sslMode = null,
        public ?bool $enableShibboleth = null,
        public ?bool $useNetworkAssistant = null,
        public ?bool $showShibboleth = null,
        public array $extra = [],
    ) {}
}
