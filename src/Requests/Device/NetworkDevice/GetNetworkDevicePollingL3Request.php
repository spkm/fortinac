<?php

namespace spkm\FortiNac\Requests\Device\NetworkDevice;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Sets the L3 polling properties for the supplied devices: GET /device/polling/l3.
 *
 * Parameters: enabled, createRogues, frequencySeconds, priority, id.
 */
class GetNetworkDevicePollingL3Request extends ItemRequest
{
    protected string $responseShape = self::RAW;

    /**
     * @param  array<string, mixed>  $options  Query options: enabled, createRogues, frequencySeconds, priority, id
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/device/polling/l3';
    }
}
