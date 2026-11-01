<?php

namespace spkm\FortiNac\Requests\Device\NetworkDevice;

use spkm\FortiNac\Data\Device\NetworkDevice;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Begins collecting changes made to Network Device records matching the supplied filter: POST /device/monitor/start.
 */
class StartNetworkDeviceMonitorRequest extends ActionRequest
{
    protected ?string $dto = NetworkDevice::class;

    protected string $responseShape = self::LIST;

    public function resolveEndpoint(): string
    {
        return '/device/monitor/start';
    }
}
