<?php

namespace spkm\FortiNac\Requests\Logging\AuditLogEntry;

use spkm\FortiNac\Data\Logging\AuditLogEntry;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all of the matching audit logs. Includes a hash of DBID to name mappings per record type: GET /logging/audit.
 */
class GetAuditLogEntriesRequest extends ListRequest
{
    protected ?string $dto = AuditLogEntry::class;

    public function resolveEndpoint(): string
    {
        return '/logging/audit';
    }
}
