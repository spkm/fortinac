<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentity;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes the Device Identity record supplied, if it is not currently in use: DELETE /host/device-identity/{id}.
 */
class DeleteDeviceIdentityRequest extends DeleteRequest
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
        return '/host/device-identity/'.$this->id;
    }
}
