<?php

namespace spkm\FortiNac\Requests\Settings\RogueDhcpDetection;

use spkm\FortiNac\Data\Settings\RogueDhcpDetection;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the currently configured DHCP settings: GET /settings/device/rogue-DHCP-detection.
 */
class GetRogueDhcpDetectionRequest extends ItemRequest
{
    protected ?string $dto = RogueDhcpDetection::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/rogue-DHCP-detection';
    }
}
