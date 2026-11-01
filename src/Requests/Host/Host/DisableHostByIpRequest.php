<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Disables the Host Record that matches the supplied ip address: POST /host/disable-by-ip.
 *
 * Parameters: ip.
 */
class DisableHostByIpRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/disable-by-ip';
    }
}
