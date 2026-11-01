<?php

namespace spkm\FortiNac\Requests\System\ManagedServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Adds a new server to be managed by this server. Managed servers will receive configuration from this server: POST /system/managed-server.
 *
 * Parameters: ip.
 */
class CreateManagedServerRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/managed-server';
    }
}
