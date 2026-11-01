<?php

namespace spkm\FortiNac\Requests\User\Guest;

use spkm\FortiNac\Data\User\Guest;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds a new guest record to the database using the provided guest template and sponsor: POST /user/guest.
 */
class CreateGuestRequest extends WriteRequest
{
    protected ?string $dto = Guest::class;

    public function resolveEndpoint(): string
    {
        return '/user/guest';
    }
}
