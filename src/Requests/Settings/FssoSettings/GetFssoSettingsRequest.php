<?php

namespace spkm\FortiNac\Requests\Settings\FssoSettings;

use spkm\FortiNac\Data\Settings\FssoSettings;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the currently configured FSSO server settings: GET /settings/integration/FSSO.
 */
class GetFssoSettingsRequest extends ItemRequest
{
    protected ?string $dto = FssoSettings::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/FSSO';
    }
}
