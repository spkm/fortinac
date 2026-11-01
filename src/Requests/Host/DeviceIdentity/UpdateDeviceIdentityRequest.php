<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentity;

use JsonSerializable;
use spkm\FortiNac\Data\Host\DeviceIdentity;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an existing Device Identity record in the database: POST /host/device-identity/{id}.
 */
class UpdateDeviceIdentityRequest extends WriteRequest
{
    protected ?string $dto = DeviceIdentity::class;

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
        return '/host/device-identity/'.$this->id;
    }
}
