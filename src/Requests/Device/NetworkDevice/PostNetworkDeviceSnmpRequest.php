<?php

namespace spkm\FortiNac\Requests\Device\NetworkDevice;

use spkm\FortiNac\Data\Device\NetworkDeviceSnmp;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds a new SNMP device to the database: POST /device/snmp.
 */
class PostNetworkDeviceSnmpRequest extends WriteRequest
{
    protected ?string $dto = NetworkDeviceSnmp::class;

    public function resolveEndpoint(): string
    {
        return '/device/snmp';
    }
}
