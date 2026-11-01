<?php

namespace spkm\FortiNac\Resources\Device;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Device\DiscoveryDiscoverDiscovery;
use spkm\FortiNac\Data\Device\DiscoveryDiscoverStatus;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\Device\Discovery\DiscoverDiscoveryRequest;
use spkm\FortiNac\Requests\Device\Discovery\DiscoverDiscoveryStopRequest;
use spkm\FortiNac\Requests\Device\Discovery\GetDiscoveryDiscoverStatusAllRequest;
use spkm\FortiNac\Requests\Device\Discovery\GetDiscoveryDiscoverStatusRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Discovery, from FortiNac::device()->discovery().
 *
 * @extends BaseResource<Data>
 */
class DiscoveryResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Returns the percentage complete for all discoveries across all containers: GET /device/discovery/discover/status/all.
     */
    public function discoverStatusAll(): mixed
    {
        return $this->fetch(new GetDiscoveryDiscoverStatusAllRequest);
    }

    /**
     * Returns the discovery status for a single container: GET /device/discovery/discover/status.
     *
     * @param  array<string, mixed>  $options  Query options: containerName
     */
    public function discoverStatus(array $options = []): ?DiscoveryDiscoverStatus
    {
        return $this->fetchOrNull(new GetDiscoveryDiscoverStatusRequest($options));
    }

    /**
     * Stops the discovery on a single container: POST /device/discovery/discover/stop.
     *
     * @param  array<string, mixed>  $options  Query options: containerName
     */
    public function discoverStop(array $options = []): mixed
    {
        return $this->fetch(new DiscoverDiscoveryStopRequest($options));
    }

    /**
     * Starts a discovery for one of more IP ranges or seeds into adding discovered devices to the specified container: POST /device/discovery/discover.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function discover(array|Data $attributes = [], array $options = []): ?DiscoveryDiscoverDiscovery
    {
        return $this->fetch(new DiscoverDiscoveryRequest($this->payloadOf($attributes), $options));
    }
}
