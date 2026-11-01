<?php

namespace spkm\FortiNac\Requests\Device\NetworkDevice;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Resync Interfaces for the supplied devices. Note: This REST API is introduced in v7.2.6: POST /device/resync-interfaces.
 *
 * Parameters: id.
 */
class ResyncNetworkDeviceInterfacesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/device/resync-interfaces';
    }
}
