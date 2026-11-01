<?php

namespace spkm\FortiNac\Requests\Device\Discovery;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Stops the discovery on a single container: POST /device/discovery/discover/stop.
 *
 * Parameters: containerName.
 */
class DiscoverDiscoveryStopRequest extends ActionRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/device/discovery/discover/stop';
    }
}
