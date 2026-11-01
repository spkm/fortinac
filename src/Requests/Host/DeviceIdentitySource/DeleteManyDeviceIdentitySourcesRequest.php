<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentitySource;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Device Identity Source records supplied under the id parameter: POST /host/device-identity-source/delete.
 *
 * Parameters: id.
 */
class DeleteManyDeviceIdentitySourcesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/device-identity-source/delete';
    }
}
