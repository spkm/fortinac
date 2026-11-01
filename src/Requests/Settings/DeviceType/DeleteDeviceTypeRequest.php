<?php

namespace spkm\FortiNac\Requests\Settings\DeviceType;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Device Type record by ID: DELETE /settings/device/device-type/{id}.
 */
class DeleteDeviceTypeRequest extends DeleteRequest
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
        return '/settings/device/device-type/'.$this->id;
    }
}
