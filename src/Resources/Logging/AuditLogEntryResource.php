<?php

namespace spkm\FortiNac\Resources\Logging;

use spkm\FortiNac\Data\Logging\AuditLogEntry;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Logging\AuditLogEntry\CountAuditLogEntriesRequest;
use spkm\FortiNac\Requests\Logging\AuditLogEntry\GetAuditLogEntriesRequest;

/**
 * Audit Log, from FortiNac::logging()->audit().
 *
 * @extends Builder<AuditLogEntry>
 */
class AuditLogEntryResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, AuditLogEntry::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAuditLogEntriesRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountAuditLogEntriesRequest($query);
    }
}
