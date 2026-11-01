<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Data\Host\Host;
use spkm\FortiNac\Requests\ItemRequest;
use spkm\FortiNac\Support\Path;

/**
 * Returns the Host Record that matches the supplied IP address: GET /host/by-ip/{ip}.
 */
class GetHostByIpRequest extends ItemRequest
{
    protected ?string $dto = Host::class;

    public function __construct(protected string $ip) {}

    public function resolveEndpoint(): string
    {
        return '/host/by-ip/'.Path::segment($this->ip);
    }
}
