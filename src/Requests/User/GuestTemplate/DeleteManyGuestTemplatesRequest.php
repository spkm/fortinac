<?php

namespace spkm\FortiNac\Requests\User\GuestTemplate;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the guest template record or records supplied, if they are none are currently in use: POST /user/guest-template/delete.
 *
 * Parameters: id.
 */
class DeleteManyGuestTemplatesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/guest-template/delete';
    }
}
