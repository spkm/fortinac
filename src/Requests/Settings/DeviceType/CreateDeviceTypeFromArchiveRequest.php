<?php

namespace spkm\FortiNac\Requests\Settings\DeviceType;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Creates a new Device Type record, and assigns it an image from the image archive: POST /settings/device/device-type/createFromArchive.
 *
 * Parameters: imageName.
 */
class CreateDeviceTypeFromArchiveRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/device/device-type/createFromArchive';
    }
}
