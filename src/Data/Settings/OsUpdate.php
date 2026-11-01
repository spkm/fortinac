<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A OsUpdate record.
 */
readonly class OsUpdate extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $name = null,
        public ?string $ip = null,
        public ?string $concurrentLicenses = null,
        public ?string $rtrLicenses = null,
        public ?string $highAvail = null,
        public ?string $remoteRadius = null,
        public ?string $deviceProfiler = null,
        public ?string $guestManager = null,
        public ?string $wirelessOnly = null,
        public ?string $integrationSuite = null,
        public ?string $endpointCompliance = null,
        public ?string $licenseName = null,
        public ?string $expDate = null,
        public ?string $serial = null,
        public ?string $mac = null,
        public ?string $serverType = null,
        public ?string $uuid = null,
        public array $extra = [],
    ) {}
}
