<?php

namespace spkm\FortiNac\Requests\System\ManagedServer;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Queries hardware status and performance informaiton: GET /system/properties/hardware.
 */
class GetManagedServerHardwareRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/properties/hardware';
    }
}
