<?php

namespace spkm\FortiNac\Requests\Device\Port;

use spkm\FortiNac\Data\Device\PortByDevice;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a summary of all ports associated with the supplied network devices: GET /device/port/by-device.
 *
 * Parameters: devID, Request Body.
 */
class GetPortByDeviceRequest extends ItemRequest
{
    protected ?string $dto = PortByDevice::class;

    /**
     * @param  array<string, mixed>  $options  Query options: devID, Request Body
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/device/port/by-device';
    }
}
