<?php

namespace spkm\FortiNac\Requests\User\SelfRegistration;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a count of all self registration requests in the database: GET /user/guest-self-registration/count/all.
 */
class CountAllSelfRegistrationsRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/user/guest-self-registration/count/all';
    }
}
