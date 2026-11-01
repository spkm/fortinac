<?php

namespace spkm\FortiNac\Requests\Settings\RogueDhcpDetection;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes one or more vlans being scanned for Rogue DHCP servers: POST /settings/device/rogue-DHCP-detection/vlan/delete.
 *
 * Parameters: dbid.
 */
class PostRogueDhcpDetectionVlanDeleteRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/device/rogue-DHCP-detection/vlan/delete';
    }
}
