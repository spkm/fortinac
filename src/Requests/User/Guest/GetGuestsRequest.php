<?php

namespace spkm\FortiNac\Requests\User\Guest;

use spkm\FortiNac\Data\User\Guest;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all guest account records which match the supplied fitler: GET /user/guest.
 */
class GetGuestsRequest extends ListRequest
{
    protected ?string $dto = Guest::class;

    public function resolveEndpoint(): string
    {
        return '/user/guest';
    }
}
