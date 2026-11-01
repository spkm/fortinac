<?php

namespace spkm\FortiNac\Requests\User\SelfRegistration;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns a count of self registration request records matching the supplied filter: GET /user/guest-self-registration/count.
 */
class CountSelfRegistrationsRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/guest-self-registration/count';
    }
}
