<?php

namespace spkm\FortiNac\Requests\Device\NetworkDevice;

use JsonSerializable;
use spkm\FortiNac\Data\Device\NetworkDeviceSnmpById;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an existing SNMP device in the database: POST /device/snmp/{id}.
 */
class PostNetworkDeviceSnmpByIdRequest extends WriteRequest
{
    protected ?string $dto = NetworkDeviceSnmpById::class;

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
        return '/device/snmp/'.$this->id;
    }
}
