<?php

namespace spkm\FortiNac\Requests\System\ManagedServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Removes a server from management. The server will no longer receive configuration changes and will be able to manage all locally defined configurations: POST /system/managed-server/delete.
 *
 * Parameters: id.
 */
class DeleteManyManagedServersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/managed-server/delete';
    }
}
