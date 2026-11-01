<?php

namespace spkm\FortiNac\Requests\User\Guest;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sends a SMS to one ore more mobile numbers associated with the supplied guest account ids: POST /user/guest/send-sms.
 *
 * Parameters: id, messageTemplate.
 */
class SendGuestSmsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/guest/send-sms';
    }
}
