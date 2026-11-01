<?php

namespace spkm\FortiNac\Requests\System\ManagedServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Synchronizes data from the management server to the managed server: POST /system/managed-server/sync.
 *
 * Parameters: serverIP.
 */
class SyncManagedServerRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/managed-server/sync';
    }
}
