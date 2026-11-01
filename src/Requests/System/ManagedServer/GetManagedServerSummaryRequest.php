<?php

namespace spkm\FortiNac\Requests\System\ManagedServer;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the cluster information for all managed servers, listing Control/Application pairs and High Availability servers: GET /system/managed-server/summary.
 */
class GetManagedServerSummaryRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/managed-server/summary';
    }
}
