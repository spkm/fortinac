<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentitySource;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Device Identity Source record by ID: POST /host/device-identity-source/{id}/delete.
 */
class DeleteDeviceIdentitySourceViaPostRequest extends ActionRequest
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
        return '/host/device-identity-source/'.$this->id.'/delete';
    }
}
