<?php

namespace spkm\FortiNac\Requests\Settings\OsUpdate;

use spkm\FortiNac\Data\Settings\OsUpdateLogs;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the OS Update Servers logs: GET /settings/udpates/os-updates/logs.
 */
class GetOsUpdateLogsRequest extends ItemRequest
{
    protected ?string $dto = OsUpdateLogs::class;

    public function resolveEndpoint(): string
    {
        return '/settings/udpates/os-updates/logs';
    }
}
