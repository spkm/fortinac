<?php

namespace spkm\FortiNac\Requests\Ssid\Ssid;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns SSID config associated with the supplied Device and SSID ID. Note: This REST API is introduced in v7.2.6: GET /ssid/config.
 *
 * Parameters: ssid, device.
 */
class GetSsidConfigRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: ssid, device
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/ssid/config';
    }
}
