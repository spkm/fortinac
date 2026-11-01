<?php

namespace spkm\FortiNac\Requests\Settings\NatDetection;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * POST /settings/device/NAT-detection/ip-ranges: POST /settings/device/NAT-detection/ip-ranges.
 *
 * Parameters: startIP, endIP, dbid.
 */
class PostNatDetectionIpRangesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/device/NAT-detection/ip-ranges';
    }
}
