<?php

namespace spkm\FortiNac\Requests\Device\NetworkDevice;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the Network Device record or records supplied, if they are not currently in use: POST /device/delete.
 *
 * Parameters: id.
 */
class DeleteManyNetworkDevicesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/device/delete';
    }
}
