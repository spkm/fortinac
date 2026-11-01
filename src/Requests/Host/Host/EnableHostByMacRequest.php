<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the Host Record that matches the supplied mac address: POST /host/enable-by-mac.
 *
 * Parameters: mac.
 */
class EnableHostByMacRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/enable-by-mac';
    }
}
