<?php

namespace spkm\FortiNac\Requests\Settings\SyslogServer;

use spkm\FortiNac\Data\Settings\SyslogServer;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of syslog parser records matching the supplied filter: GET /settings/integration/syslog.
 */
class GetSyslogServersRequest extends ListRequest
{
    protected ?string $dto = SyslogServer::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/syslog';
    }
}
