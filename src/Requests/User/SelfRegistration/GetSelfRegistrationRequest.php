<?php

namespace spkm\FortiNac\Requests\User\SelfRegistration;

use spkm\FortiNac\Data\User\SelfRegistration;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of self registration request records matching the supplied database id: GET /user/guest-self-registration/{id}.
 */
class GetSelfRegistrationRequest extends ItemRequest
{
    protected ?string $dto = SelfRegistration::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/user/guest-self-registration/'.$this->id;
    }
}
