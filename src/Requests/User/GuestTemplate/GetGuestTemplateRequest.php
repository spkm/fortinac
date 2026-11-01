<?php

namespace spkm\FortiNac\Requests\User\GuestTemplate;

use spkm\FortiNac\Data\User\GuestTemplate;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the guest template record with the supplied DBID: GET /user/guest-template/{id}.
 */
class GetGuestTemplateRequest extends ItemRequest
{
    protected ?string $dto = GuestTemplate::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/user/guest-template/'.$this->id;
    }
}
