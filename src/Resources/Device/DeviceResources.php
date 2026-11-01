<?php

namespace spkm\FortiNac\Resources\Device;

/**
 * Network devices, their ports and containers, and the scans that find them.
 *
 * FortiNac::device() is itself the builder over Network Device (NetworkDeviceResource); the API's other
 * collections are its methods.
 */
class DeviceResources extends NetworkDeviceResource
{
    /**
     * Container.
     */
    public function containers(): ContainerResource
    {
        return new ContainerResource($this->connector);
    }

    /**
     * Discovery.
     */
    public function discovery(): DiscoveryResource
    {
        return new DiscoveryResource($this->connector);
    }

    /**
     * L3 Scan.
     */
    public function l3Scan(): L3ScanResource
    {
        return new L3ScanResource($this->connector);
    }

    /**
     * Port.
     */
    public function portChanges(): PortChangeResource
    {
        return new PortChangeResource($this->connector);
    }

    /**
     * Port.
     */
    public function ports(): PortResource
    {
        return new PortResource($this->connector);
    }
}
