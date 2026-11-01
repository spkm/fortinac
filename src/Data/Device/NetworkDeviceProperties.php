<?php

namespace spkm\FortiNac\Data\Device;

use spkm\FortiNac\Data\Data;

/**
 * A NetworkDeviceProperties record.
 */
readonly class NetworkDeviceProperties extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $agentDelayStr = null,
        public ?string $minTrapPeriodStr = null,
        public ?string $maxTrapPeriodsStr = null,
        public ?string $coldWarmTrapDelayStr = null,
        public ?string $regDelayStr = null,
        public ?string $uplinkCountStr = null,
        public ?string $telnetTimeoutStr = null,
        public ?string $vlanResetDelayStr = null,
        public ?string $vlanSwitchingDelayStr = null,
        public ?string $macSpoofDelayStr = null,
        public ?string $multiAccessStr = null,
        public ?string $multiAccessThreshold = null,
        public ?string $ciscoDiscoveryStr = null,
        public ?string $lldpDiscoveryStr = null,
        public ?string $cdpMaxHopsStr = null,
        public ?string $ignoreMacNotifyOnPhoneStr = null,
        public ?string $meAccessPolicy = null,
        public ?string $preservePortNamesStr = null,
        public ?string $telnetTimeout = null,
        public ?string $preservePortNames = null,
        public ?string $vlanSwitchingDelay = null,
        public ?string $agentDelay = null,
        public ?string $minTrapPeriod = null,
        public ?string $getmaxTrapPeriods = null,
        public ?string $coldWarmTrapDelay = null,
        public ?string $regDelay = null,
        public ?string $uplinkCount = null,
        public ?string $vlanResetDelay = null,
        public ?string $macSpoofDelay = null,
        public ?string $multiAccess = null,
        public ?string $ciscoDiscovery = null,
        public ?string $lldpDiscovery = null,
        public ?string $ciscoDiscoveryMaxHops = null,
        public ?string $ignoreMacNotifyOnPhone = null,
        public array $extra = [],
    ) {}
}
