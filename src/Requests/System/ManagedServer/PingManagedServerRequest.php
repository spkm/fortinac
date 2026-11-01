<?php

namespace spkm\FortiNac\Requests\System\ManagedServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Get server data from a POD managed server from the management server: POST /system/managed-server/ping.
 *
 * Parameters: address.
 */
class PingManagedServerRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/managed-server/ping';
    }
}
