<?php

namespace spkm\FortiNac\Requests\User\Guest;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Creates a conference account and any subsequent guest accounts: POST /user/guest/conference.
 *
 * Parameters: type, attendeeCount, startTime, endTime, templateID, password.
 */
class PostGuestConferenceRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/guest/conference';
    }
}
