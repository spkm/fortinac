<?php

namespace spkm\FortiNac\Requests\Settings\NetworkAddressGroup;

use spkm\FortiNac\Data\Settings\NetworkAddressGroup;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Address record, updating instead if the supplied profile has a DBID of one that already exists: POST /settings/device/network-address-group.
 */
class CreateNetworkAddressGroupRequest extends WriteRequest
{
    protected ?string $dto = NetworkAddressGroup::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/network-address-group';
    }
}
