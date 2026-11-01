<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of allowed Host Records on this system: GET /host/global-allowed-hosts.
 */
class GetHostGlobalAllowedHostsRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/host/global-allowed-hosts';
    }
}
