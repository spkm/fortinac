<?php

namespace spkm\FortiNac\Requests\User\Guest;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns a count of guest account records matching the supplied filter: GET /user/guest/count.
 */
class CountGuestsRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/guest/count';
    }
}
