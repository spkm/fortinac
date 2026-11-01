<?php

namespace spkm\FortiNac\Requests\Winbind\WinbindConfig;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Retrieves the current status for the Winbind service: GET /winbind/config/status.
 */
class GetWinbindConfigStatusRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/winbind/config/status';
    }
}
