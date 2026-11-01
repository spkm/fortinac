<?php

namespace spkm\FortiNac\Requests\Device\NetworkDevice;

use JsonSerializable;
use spkm\FortiNac\Data\Device\NetworkDevicePingableById;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an existing pingable device in the database: POST /device/pingable/{id}.
 */
class PostNetworkDevicePingableByIdRequest extends WriteRequest
{
    protected ?string $dto = NetworkDevicePingableById::class;

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
        return '/device/pingable/'.$this->id;
    }
}
