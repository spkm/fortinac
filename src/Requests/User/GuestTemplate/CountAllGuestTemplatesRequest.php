<?php

namespace spkm\FortiNac\Requests\User\GuestTemplate;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all guest template records in the database: GET /user/guest-template/count/all.
 */
class CountAllGuestTemplatesRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/user/guest-template/count/all';
    }
}
