<?php

namespace spkm\FortiNac\Requests\Winbind\WinbindConfig;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the Winbind service for the system: POST /winbind/config/enable.
 */
class EnableManyWinbindConfigsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/winbind/config/enable';
    }
}
