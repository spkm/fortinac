<?php

namespace spkm\FortiNac\Requests\Settings\FssoSettings;

use spkm\FortiNac\Data\Settings\FssoSettings;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Add FSSO settings: POST /settings/integration/FSSO.
 *
 * Parameters: enabled, port, password.
 */
class UpdateFssoSettingsRequest extends ActionRequest
{
    protected ?string $dto = FssoSettings::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/FSSO';
    }
}
