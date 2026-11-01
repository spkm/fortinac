<?php

namespace spkm\FortiNac\Requests\User\Guest;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the guest account record or records supplied, if they are none are currently in use: POST /user/guest/delete.
 *
 * Parameters: id.
 */
class DeleteManyGuestsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/guest/delete';
    }
}
