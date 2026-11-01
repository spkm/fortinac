<?php

namespace spkm\FortiNac\Requests\Settings\NetworkAddress;

use spkm\FortiNac\Data\Settings\NetworkAddress;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Address records matching the supplied filter: GET /settings/device/network-address.
 */
class GetNetworkAddressesRequest extends ListRequest
{
    protected ?string $dto = NetworkAddress::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/network-address';
    }
}
