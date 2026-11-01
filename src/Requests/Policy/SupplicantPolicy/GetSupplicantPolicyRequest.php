<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantPolicy;

use spkm\FortiNac\Data\Policy\SupplicantPolicy;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Supplicant Policy records matching the supplied filter: GET /policy/supplicant/{id}.
 */
class GetSupplicantPolicyRequest extends ItemRequest
{
    protected ?string $dto = SupplicantPolicy::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/supplicant/'.$this->id;
    }
}
