<?php

namespace spkm\FortiNac\Data\Radius;

use spkm\FortiNac\Data\Data;

/**
 * A RadiusServerGlobal record.
 */
readonly class RadiusServerGlobal extends Data
{
    /**
     * @param  array<mixed>|null  $tlsConfig
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $authPort = null,
        public ?int $radSecAuthPort = null,
        public ?int $proxyAuthPort = null,
        public ?bool $radSecEnabled = null,
        public ?bool $radSecRequired = null,
        public ?bool $radSecClientCertRequired = null,
        public ?bool $serviceEnabled = null,
        public ?bool $serviceRunning = null,
        public ?bool $healthMonitoring = null,
        public ?bool $sendFailureEvents = null,
        public ?array $tlsConfig = null,
        public ?int $serviceLogLevel = null,
        public mixed $serviceDebugHostFilter = null,
        public ?bool $serverDebugEnabled = null,
        public mixed $serverDebugHostFilter = null,
        public ?bool $serverPolicyDebugEnabled = null,
        public array $extra = [],
    ) {}
}
