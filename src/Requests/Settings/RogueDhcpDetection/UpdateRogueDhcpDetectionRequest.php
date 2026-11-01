<?php

namespace spkm\FortiNac\Requests\Settings\RogueDhcpDetection;

use spkm\FortiNac\Data\Settings\RogueDhcpDetection;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Adds a DHCP server Config: POST /settings/device/rogue-DHCP-detection.
 *
 * Parameters: dhcpInterface.
 */
class UpdateRogueDhcpDetectionRequest extends ActionRequest
{
    protected ?string $dto = RogueDhcpDetection::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/rogue-DHCP-detection';
    }
}
