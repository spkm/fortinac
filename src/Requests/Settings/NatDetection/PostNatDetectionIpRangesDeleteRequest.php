<?php

namespace spkm\FortiNac\Requests\Settings\NatDetection;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * POST /settings/device/NAT-detection/ip-ranges/delete: POST /settings/device/NAT-detection/ip-ranges/delete.
 *
 * Parameters: id.
 */
class PostNatDetectionIpRangesDeleteRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/device/NAT-detection/ip-ranges/delete';
    }
}
