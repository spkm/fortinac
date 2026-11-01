<?php

namespace spkm\FortiNac\Requests\Settings\NetworkAddress;

use JsonSerializable;
use spkm\FortiNac\Data\Settings\NetworkAddress;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Address record: POST /settings/device/network-address/{id}.
 */
class UpdateNetworkAddressRequest extends WriteRequest
{
    protected ?string $dto = NetworkAddress::class;

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
        return '/settings/device/network-address/'.$this->id;
    }
}
