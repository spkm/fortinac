<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationPolicy;

use spkm\FortiNac\Data\Policy\AuthenticationPolicy;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Authentication Policy records matching the id: GET /policy/authentication/{id}.
 */
class GetAuthenticationPolicyRequest extends ItemRequest
{
    protected ?string $dto = AuthenticationPolicy::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/authentication/'.$this->id;
    }
}
