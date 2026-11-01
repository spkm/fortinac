<?php

namespace spkm\FortiNac\Requests\Settings\NetworkAddressGroup;

use spkm\FortiNac\Data\Settings\NetworkAddressGroup;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Address records matching the supplied filter: GET /settings/device/network-address-group.
 */
class GetNetworkAddressGroupsRequest extends ListRequest
{
    protected ?string $dto = NetworkAddressGroup::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/network-address-group';
    }
}
