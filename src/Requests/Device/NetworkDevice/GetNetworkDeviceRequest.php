<?php

namespace spkm\FortiNac\Requests\Device\NetworkDevice;

use spkm\FortiNac\Data\Device\NetworkDevice;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the Network Device record with the supplied DBID: GET /device/{id}.
 */
class GetNetworkDeviceRequest extends ItemRequest
{
    protected ?string $dto = NetworkDevice::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/device/'.$this->id;
    }
}
