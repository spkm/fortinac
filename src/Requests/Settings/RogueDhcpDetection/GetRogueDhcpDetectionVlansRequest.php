<?php

namespace spkm\FortiNac\Requests\Settings\RogueDhcpDetection;

use spkm\FortiNac\Data\Settings\RogueDhcpDetectionVlans;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the configured rogue DHCP vlans to scan: GET /settings/device/rogue-DHCP-detection/vlans.
 */
class GetRogueDhcpDetectionVlansRequest extends ItemRequest
{
    protected ?string $dto = RogueDhcpDetectionVlans::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/rogue-DHCP-detection/vlans';
    }
}
