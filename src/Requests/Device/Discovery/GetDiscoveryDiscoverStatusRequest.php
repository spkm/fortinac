<?php

namespace spkm\FortiNac\Requests\Device\Discovery;

use spkm\FortiNac\Data\Device\DiscoveryDiscoverStatus;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the discovery status for a single container: GET /device/discovery/discover/status.
 *
 * Parameters: containerName.
 */
class GetDiscoveryDiscoverStatusRequest extends ItemRequest
{
    protected ?string $dto = DiscoveryDiscoverStatus::class;

    /**
     * @param  array<string, mixed>  $options  Query options: containerName
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/device/discovery/discover/status';
    }
}
