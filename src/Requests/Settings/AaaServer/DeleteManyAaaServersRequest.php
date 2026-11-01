<?php

namespace spkm\FortiNac\Requests\Settings\AaaServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the AAA Server record or records supplied, if they are not currently in use: POST /settings/integration/aaa/delete.
 *
 * Parameters: id.
 */
class DeleteManyAaaServersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa/delete';
    }
}
