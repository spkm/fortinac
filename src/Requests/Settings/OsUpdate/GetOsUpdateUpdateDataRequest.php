<?php

namespace spkm\FortiNac\Requests\Settings\OsUpdate;

use spkm\FortiNac\Data\Settings\OsUpdateUpdateData;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the OS Update data: GET /settings/udpates/os-updates/update-data.
 */
class GetOsUpdateUpdateDataRequest extends ItemRequest
{
    protected ?string $dto = OsUpdateUpdateData::class;

    public function resolveEndpoint(): string
    {
        return '/settings/udpates/os-updates/update-data';
    }
}
