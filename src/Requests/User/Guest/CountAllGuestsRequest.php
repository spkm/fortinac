<?php

namespace spkm\FortiNac\Requests\User\Guest;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all guest account records in the database: GET /user/guest/count/all.
 */
class CountAllGuestsRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/user/guest/count/all';
    }
}
