<?php

namespace spkm\FortiNac\Requests\Settings\DeviceType;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Device Type records supplied under the id parameter: POST /settings/device/device-type/delete.
 *
 * Parameters: id.
 */
class DeleteManyDeviceTypesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/device/device-type/delete';
    }
}
