<?php

namespace spkm\FortiNac\Requests\Settings\SyslogServer;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of record that reference this syslog parser record: GET /settings/integration/syslog/{id}/usage.
 */
class GetSyslogServerUsageRequest extends ItemRequest
{
    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/integration/syslog/'.$this->id.'/usage';
    }
}
