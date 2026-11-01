<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A ProxySettings record.
 */
readonly class ProxySettings extends Data
{
    protected const HIDDEN = ['httpProxyPassword', 'httpsProxyPassword', 'ftpProxyPassword'];

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $httpProxyHost = null,
        public ?string $httpProxyPort = null,
        public ?string $httpProxyUser = null,
        public ?string $httpNonProxyHosts = null,
        public ?string $httpProxyPassword = null,
        public ?string $httpsProxyPassword = null,
        public ?string $httpsProxyHost = null,
        public ?string $httpsProxyPort = null,
        public ?string $httpsProxyUser = null,
        public ?string $ftpProxyHost = null,
        public ?string $ftpProxyPort = null,
        public ?string $ftpProxyUser = null,
        public ?string $ftpProxyPassword = null,
        public ?string $ftpNonProxyHosts = null,
        public array $extra = [],
    ) {}
}
