<?php

namespace spkm\FortiNac\Requests\Settings\DeviceType;

use JsonSerializable;
use spkm\FortiNac\Data\Settings\DeviceType;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Device Type Device Type record: POST /settings/device/device-type/{id}.
 */
class UpdateDeviceTypeRequest extends WriteRequest
{
    protected ?string $dto = DeviceType::class;

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
        return '/settings/device/device-type/'.$this->id;
    }
}
