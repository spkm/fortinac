<?php

namespace spkm\FortiNac\Requests\Logging\AuditLogEntry;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns a count of the total number of audit logs: GET /logging/audit/count.
 */
class CountAuditLogEntriesRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/audit/count';
    }
}
