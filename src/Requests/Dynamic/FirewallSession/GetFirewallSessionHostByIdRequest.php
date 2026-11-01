<?php

namespace spkm\FortiNac\Requests\Dynamic\FirewallSession;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of adapter MAC addresses owned by the supplied Host Record: GET /dynamic/dynamic-connection/host/{id}.
 */
class GetFirewallSessionHostByIdRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/dynamic/dynamic-connection/host/'.$this->id;
    }
}
