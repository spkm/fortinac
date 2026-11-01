<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentitySource;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Disables the supplied Device Identity Source: POST /host/device-identity-source/{id}/disable.
 */
class DisableDeviceIdentitySourceRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/host/device-identity-source/'.$this->id.'/disable';
    }
}
