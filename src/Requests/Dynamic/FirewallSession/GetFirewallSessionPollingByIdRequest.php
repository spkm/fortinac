<?php

namespace spkm\FortiNac\Requests\Dynamic\FirewallSession;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the firewall session polling status for the supplied device: GET /dynamic/dynamic-connection/polling/{id}.
 */
class GetFirewallSessionPollingByIdRequest extends ItemRequest
{
    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/dynamic/dynamic-connection/polling/'.$this->id;
    }
}
