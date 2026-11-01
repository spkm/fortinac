<?php

namespace spkm\FortiNac\Requests\Settings\FssoSettings;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the password for the currently configured FSSO server: GET /settings/integration/FSSO/password.
 */
class GetFssoSettingsPasswordRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/FSSO/password';
    }
}
