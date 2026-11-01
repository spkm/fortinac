<?php

namespace spkm\FortiNac\Requests\User\GuestTemplate;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns a count of guest template records matching the supplied filter: GET /user/guest-template/count.
 */
class CountGuestTemplatesRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/guest-template/count';
    }
}
