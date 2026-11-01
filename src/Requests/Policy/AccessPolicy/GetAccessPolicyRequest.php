<?php

namespace spkm\FortiNac\Requests\Policy\AccessPolicy;

use spkm\FortiNac\Data\Policy\AccessPolicy;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Access Policy records matching the supplied filter: GET /policy/access/{id}.
 */
class GetAccessPolicyRequest extends ItemRequest
{
    protected ?string $dto = AccessPolicy::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/access/'.$this->id;
    }
}
