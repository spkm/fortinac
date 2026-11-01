<?php

namespace spkm\FortiNac\Requests\User\Guest;

use spkm\FortiNac\Data\User\Guest;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the guest account record with the supplied DBID: GET /user/guest/{id}.
 */
class GetGuestRequest extends ItemRequest
{
    protected ?string $dto = Guest::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/user/guest/'.$this->id;
    }
}
