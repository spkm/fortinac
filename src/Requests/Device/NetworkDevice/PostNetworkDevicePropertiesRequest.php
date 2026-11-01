<?php

namespace spkm\FortiNac\Requests\Device\NetworkDevice;

use spkm\FortiNac\Data\Device\NetworkDeviceProperties;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the properties for a Network Device: POST /device/properties.
 *
 * Parameters: agentDelay, agentDelayStr, cdpMaxHopsStr, ciscoDiscovery, ciscoDiscoveryMaxHops, ciscoDiscoveryStr, coldWarmTrapDelay, coldWarmTrapDelayStr, getmaxTrapPeriods, ignoreMacNotifyOnPhone, ignoreMacNotifyOnPhoneStr, lldpDiscovery, lldpDiscoveryStr, macSpoofDelay, macSpoofDelayStr, maxTrapPeriodsStr, meAccessPolicy, minTrapPeriod, minTrapPeriodStr, multiAccess, multiAccessStr, multiAccessThreshold, preservePortNames, preservePortNamesStr, regDelay, regDelayStr, telnetTimeout, telnetTimeoutStr, uplinkCount, uplinkCountStr, vlanResetDelay, vlanResetDelayStr, vlanSwitchingDelay, vlanSwitchingDelayStr.
 */
class PostNetworkDevicePropertiesRequest extends ActionRequest
{
    protected ?string $dto = NetworkDeviceProperties::class;

    public function resolveEndpoint(): string
    {
        return '/device/properties';
    }
}
