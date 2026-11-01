<?php

namespace spkm\FortiNac\Data\Device;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A DiscoveryDiscoverStatus record.
 */
readonly class DiscoveryDiscoverStatus extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $snmpV1Errors
     * @param  array<mixed>|null  $snmpV3Errors
     * @param  array<mixed>|null  $cliErrors
     * @param  array<mixed>|null  $vendorOIDMismatch
     * @param  array<mixed>|null  $pingFailures
     * @param  array<mixed>|null  $ipList
     * @param  array<mixed>|null  $seedList
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $currentAddress = null,
        public ?int $devicesFound = null,
        public ?bool $useCDP = null,
        public ?int $deviceTotal = null,
        public ?int $totalAddresses = null,
        public ?int $devicesProcessed = null,
        public ?array $snmpV1Errors = null,
        public ?array $snmpV3Errors = null,
        public ?array $cliErrors = null,
        public ?array $vendorOIDMismatch = null,
        public ?array $pingFailures = null,
        public ?array $ipList = null,
        public ?array $seedList = null,
        public ?CarbonImmutable $endTime = null,
        public ?string $startingAddress = null,
        public ?string $endingAddress = null,
        public array $extra = [],
    ) {}
}
