<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Registers the provided Host Record as device: POST /host/register-as-device.
 *
 * Parameters: id, role, devType, domainID, ip, regType.
 */
class RegisterHostAsDeviceRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/register-as-device';
    }
}
