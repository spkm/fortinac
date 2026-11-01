<?php

namespace spkm\FortiNac\Requests\Settings\SyslogServer;

use spkm\FortiNac\Data\Settings\SyslogServer;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of syslog parser records matching the supplied filter: GET /settings/integration/syslog/{id}.
 */
class GetSyslogServerRequest extends ItemRequest
{
    protected ?string $dto = SyslogServer::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/integration/syslog/'.$this->id;
    }
}
