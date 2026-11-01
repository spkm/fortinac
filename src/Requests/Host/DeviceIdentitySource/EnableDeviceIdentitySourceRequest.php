<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentitySource;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the supplied Device Identity Source: POST /host/device-identity-source/{id}/enable.
 */
class EnableDeviceIdentitySourceRequest extends ActionRequest
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
        return '/host/device-identity-source/'.$this->id.'/enable';
    }
}
