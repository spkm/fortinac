<?php

namespace spkm\FortiNac\Requests\Device\NetworkDevice;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Moves an existing Network Device from one container to other: GET /device/move.
 *
 * Parameters: isHost, containerID, deviceID.
 */
class GetNetworkDeviceMoveRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    /**
     * @param  array<string, mixed>  $options  Query options: isHost, containerID, deviceID
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/device/move';
    }
}
