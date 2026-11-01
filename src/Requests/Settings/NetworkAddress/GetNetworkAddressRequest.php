<?php

namespace spkm\FortiNac\Requests\Settings\NetworkAddress;

use spkm\FortiNac\Data\Settings\NetworkAddress;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Address records matching the supplied filter: GET /settings/device/network-address/{id}.
 */
class GetNetworkAddressRequest extends ItemRequest
{
    protected ?string $dto = NetworkAddress::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/device/network-address/'.$this->id;
    }
}
