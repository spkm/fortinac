<?php

namespace spkm\FortiNac\Data\Radius;

use spkm\FortiNac\Data\Data;

/**
 * A RadiusServerGlobalResult record.
 */
readonly class RadiusServerGlobalResult extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $authPort = null,
        public ?int $proxyAuthPort = null,
        public ?bool $serviceEnabled = null,
        public ?bool $serviceRunning = null,
        public ?bool $healthMonitoring = null,
        public ?bool $sendFailureEvents = null,
        public ?int $serviceLogLevel = null,
        public ?string $serviceDebugHostFilter = null,
        public ?bool $serverDebugEnabled = null,
        public ?string $serverDebugHostFilter = null,
        public ?bool $serverPolicyDebugEnabled = null,
        public array $extra = [],
    ) {}
}
