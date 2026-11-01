<?php

namespace spkm\FortiNac\Requests\User\Guest;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sends an email to one or more email addresses associated with the supplied guest account ids: POST /user/guest/send-email.
 *
 * Parameters: id, messageTemplate.
 */
class SendGuestEmailRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/guest/send-email';
    }
}
