<?php

namespace spkm\FortiNac\Requests\Device\Discovery;

use spkm\FortiNac\Data\Device\DiscoveryDiscoverDiscovery;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Starts a discovery for one of more IP ranges or seeds into adding discovered devices to the specified container: POST /device/discovery/discover.
 */
class DiscoverDiscoveryRequest extends WriteRequest
{
    protected ?string $dto = DiscoveryDiscoverDiscovery::class;

    public function resolveEndpoint(): string
    {
        return '/device/discovery/discover';
    }
}
