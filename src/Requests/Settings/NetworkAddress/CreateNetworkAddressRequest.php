<?php

namespace spkm\FortiNac\Requests\Settings\NetworkAddress;

use spkm\FortiNac\Data\Settings\NetworkAddress;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Address record, updating instead if the supplied profile has a DBID of one that already exists: POST /settings/device/network-address.
 */
class CreateNetworkAddressRequest extends WriteRequest
{
    protected ?string $dto = NetworkAddress::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/network-address';
    }
}
