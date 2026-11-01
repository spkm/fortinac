<?php

namespace spkm\FortiNac\Requests\Settings\NatDetection;

use spkm\FortiNac\Data\Settings\NatDetection;
use spkm\FortiNac\Requests\ListRequest;

/**
 * GET /settings/device/NAT-detection: GET /settings/device/NAT-detection.
 */
class GetNatDetectionRequest extends ListRequest
{
    protected ?string $dto = NatDetection::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/NAT-detection';
    }
}
