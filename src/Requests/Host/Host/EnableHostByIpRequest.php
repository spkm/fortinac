<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the Host Record that matches the supplied ip address: POST /host/enable-by-ip.
 *
 * Parameters: ip.
 */
class EnableHostByIpRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/enable-by-ip';
    }
}
