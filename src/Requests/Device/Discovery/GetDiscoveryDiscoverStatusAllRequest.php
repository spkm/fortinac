<?php

namespace spkm\FortiNac\Requests\Device\Discovery;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the percentage complete for all discoveries across all containers: GET /device/discovery/discover/status/all.
 */
class GetDiscoveryDiscoverStatusAllRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/device/discovery/discover/status/all';
    }
}
