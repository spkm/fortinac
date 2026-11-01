<?php

namespace spkm\FortiNac\Requests\Settings\RogueDhcpDetection;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Adds a new vlan to scan for Rogue DHCP detection: POST /settings/device/rogue-DHCP-detection/vlan.
 *
 * Parameters: vlan, vlanName, dbid.
 */
class PostRogueDhcpDetectionVlanRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/device/rogue-DHCP-detection/vlan';
    }
}
