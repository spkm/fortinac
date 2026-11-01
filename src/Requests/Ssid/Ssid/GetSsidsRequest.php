<?php

namespace spkm\FortiNac\Requests\Ssid\Ssid;

use spkm\FortiNac\Data\Ssid\Ssid;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a summary of all SSIDs associated with the supplied device. Note: This REST API is introduced in v7.2.6: GET /ssid.
 */
class GetSsidsRequest extends ListRequest
{
    protected ?string $dto = Ssid::class;

    public function resolveEndpoint(): string
    {
        return '/ssid';
    }
}
