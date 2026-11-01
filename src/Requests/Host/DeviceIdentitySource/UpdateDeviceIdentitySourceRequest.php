<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentitySource;

use JsonSerializable;
use spkm\FortiNac\Data\Host\DeviceIdentitySource;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Device Identity Source record: POST /host/device-identity-source/{id}.
 */
class UpdateDeviceIdentitySourceRequest extends WriteRequest
{
    protected ?string $dto = DeviceIdentitySource::class;

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
        return '/host/device-identity-source/'.$this->id;
    }
}
