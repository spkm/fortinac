<?php

namespace spkm\FortiNac\Requests\Settings\NetworkAddressGroup;

use JsonSerializable;
use spkm\FortiNac\Data\Settings\NetworkAddressGroup;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Address record: POST /settings/device/network-address-group/{id}.
 */
class UpdateNetworkAddressGroupRequest extends WriteRequest
{
    protected ?string $dto = NetworkAddressGroup::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/device/network-address-group/'.$this->id;
    }
}
