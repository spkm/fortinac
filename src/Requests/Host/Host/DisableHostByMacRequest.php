<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Disables the Host Record that matches the supplied mac address: POST /host/disable-by-mac.
 *
 * Parameters: mac.
 */
class DisableHostByMacRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/disable-by-mac';
    }
}
