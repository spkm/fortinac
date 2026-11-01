<?php

namespace spkm\FortiNac\Resources\Device;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\Device\L3Scan\GetL3ScanStatusRequest;
use spkm\FortiNac\Requests\Device\L3Scan\StartL3ScanRequest;
use spkm\FortiNac\Requests\Device\L3Scan\StopL3ScanRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * L3 Scan, from FortiNac::device()->l3Scan().
 *
 * @extends BaseResource<Data>
 */
class L3ScanResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Returns the results for the last completed scan or the one currently in progress: GET /device/l3scan/status.
     */
    public function status(): mixed
    {
        return $this->fetch(new GetL3ScanStatusRequest);
    }

    /**
     * Stops an L3 scan if it is currently running: POST /device/l3scan/stop.
     *
     * @param  array<string, mixed>  $options
     */
    public function stop(array $options = []): bool
    {
        return $this->perform(new StopL3ScanRequest($options));
    }

    /**
     * Starts an L3 scan of all the devices in order to identify potential L3 sources: POST /device/l3scan/start.
     *
     * @param  array<string, mixed>  $options
     */
    public function start(array $options = []): bool
    {
        return $this->perform(new StartL3ScanRequest($options));
    }
}
