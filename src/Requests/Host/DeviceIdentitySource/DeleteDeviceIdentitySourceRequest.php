<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentitySource;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Device Identity Source record by ID: DELETE /host/device-identity-source/{id}.
 */
class DeleteDeviceIdentitySourceRequest extends DeleteRequest
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
        return '/host/device-identity-source/'.$this->id;
    }
}
