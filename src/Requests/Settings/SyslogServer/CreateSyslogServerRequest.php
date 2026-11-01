<?php

namespace spkm\FortiNac\Requests\Settings\SyslogServer;

use spkm\FortiNac\Data\Settings\SyslogServer;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new syslog parser record, updating instead if the supplied profile has a DBID of one that already exists: POST /settings/integration/syslog.
 */
class CreateSyslogServerRequest extends WriteRequest
{
    protected ?string $dto = SyslogServer::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/syslog';
    }
}
