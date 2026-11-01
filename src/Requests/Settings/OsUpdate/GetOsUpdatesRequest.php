<?php

namespace spkm\FortiNac\Requests\Settings\OsUpdate;

use spkm\FortiNac\Data\Settings\OsUpdate;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns the OS Update Servers: GET /settings/udpates/os-updates.
 */
class GetOsUpdatesRequest extends ListRequest
{
    protected ?string $dto = OsUpdate::class;

    public function resolveEndpoint(): string
    {
        return '/settings/udpates/os-updates';
    }
}
