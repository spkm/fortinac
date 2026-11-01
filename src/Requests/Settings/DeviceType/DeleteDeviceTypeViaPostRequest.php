<?php

namespace spkm\FortiNac\Requests\Settings\DeviceType;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Device Type record by ID: POST /settings/device/device-type/{id}/delete.
 */
class DeleteDeviceTypeViaPostRequest extends ActionRequest
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
        return '/settings/device/device-type/'.$this->id.'/delete';
    }
}
