<?php

namespace spkm\FortiNac\Requests\Settings\NetworkAddressGroup;

use spkm\FortiNac\Data\Settings\NetworkAddressGroup;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Address records matching the supplied filter: GET /settings/device/network-address-group/{id}.
 */
class GetNetworkAddressGroupRequest extends ItemRequest
{
    protected ?string $dto = NetworkAddressGroup::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/device/network-address-group/'.$this->id;
    }
}
