<?php

namespace spkm\FortiNac\Requests\Winbind\WinbindConfig;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes multiple winbind configuration objects by ID: POST /winbind/config/delete.
 *
 * Parameters: id, replaceWinbindId.
 */
class DeleteManyWinbindConfigsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/winbind/config/delete';
    }
}
