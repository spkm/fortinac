<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentity;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the Device Identity record or records supplied, if they are not currently in use: POST /host/device-identity/delete.
 *
 * Parameters: id.
 */
class DeleteManyDeviceIdentitiesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/device-identity/delete';
    }
}
