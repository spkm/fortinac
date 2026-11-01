<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Data\Host\Host;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the Host Record that matches the supplied MAC address: GET /host/by-mac/{mac}.
 */
class GetHostByMacRequest extends ItemRequest
{
    protected ?string $dto = Host::class;

    public function __construct(protected string $mac) {}

    public function resolveEndpoint(): string
    {
        return '/host/by-mac/'.rawurlencode($this->mac);
    }
}
