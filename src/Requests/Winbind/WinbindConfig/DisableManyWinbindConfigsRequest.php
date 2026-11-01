<?php

namespace spkm\FortiNac\Requests\Winbind\WinbindConfig;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Disables the Winbind service for the system: POST /winbind/config/disable.
 */
class DisableManyWinbindConfigsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/winbind/config/disable';
    }
}
