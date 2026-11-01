<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentity;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the Device Identity record supplied, if they are not currently in use: POST /host/device-identity/{id}/delete.
 */
class DeleteDeviceIdentityViaPostRequest extends ActionRequest
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
        return '/host/device-identity/'.$this->id.'/delete';
    }
}
