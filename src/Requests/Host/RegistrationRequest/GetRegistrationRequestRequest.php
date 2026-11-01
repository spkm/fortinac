<?php

namespace spkm\FortiNac\Requests\Host\RegistrationRequest;

use spkm\FortiNac\Data\Host\RegistrationRequest;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Host Registration Request records matching the supplied filter: GET /host/registration-request/{id}.
 */
class GetRegistrationRequestRequest extends ItemRequest
{
    protected ?string $dto = RegistrationRequest::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/host/registration-request/'.$this->id;
    }
}
