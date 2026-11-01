<?php

namespace spkm\FortiNac\Requests\Settings\NetworkAddressGroup;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records that reference this Address record: GET /settings/device/network-address-group/{id}/usage.
 */
class GetNetworkAddressGroupUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/device/network-address-group/'.$this->id.'/usage';
    }
}
