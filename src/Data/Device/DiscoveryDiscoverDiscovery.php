<?php

namespace spkm\FortiNac\Data\Device;

use spkm\FortiNac\Data\Data;

/**
 * A DiscoveryDiscoverDiscovery record.
 */
readonly class DiscoveryDiscoverDiscovery extends Data
{
    protected const HIDDEN = ['snmpV3Credentials', 'cliCredentials'];

    /**
     * @param  array<mixed>|null  $ipRanges
     * @param  array<mixed>|null  $cdpSeeds
     * @param  array<mixed>|null  $snmpSecurityStrings
     * @param  array<mixed>|null  $snmpV3Credentials
     * @param  array<mixed>|null  $cliCredentials
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?bool $additionalProp1 = null,
        public ?bool $additionalProp2 = null,
        public ?bool $additionalProp3 = null,
        public ?string $container = null,
        public ?bool $useCDP = null,
        public ?array $ipRanges = null,
        public ?array $cdpSeeds = null,
        public ?array $snmpSecurityStrings = null,
        public ?array $snmpV3Credentials = null,
        public ?array $cliCredentials = null,
        public array $extra = [],
    ) {}
}
