<?php

namespace spkm\FortiNac\Requests\Winbind\WinbindConfig;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Retrieves the global Winbind service data. (currently status & default local netbios name): GET /winbind/config/global.
 */
class GetWinbindConfigGlobalRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/winbind/config/global';
    }
}
