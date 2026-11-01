<?php

namespace spkm\FortiNac\Requests\Winbind\WinbindConfig;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Retrieves the current Winbind service log (/var/log/samba/log.winbind): POST /winbind/config/log.
 *
 * Parameters: lines.
 */
class PostWinbindConfigLogRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/winbind/config/log';
    }
}
