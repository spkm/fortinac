<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationPolicy;

use spkm\FortiNac\Data\Policy\AuthenticationPolicy;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Authentication Policy record, updating instead if the supplied policy has a DBID of one that already exists: POST /policy/authentication.
 */
class CreateAuthenticationPolicyRequest extends WriteRequest
{
    protected ?string $dto = AuthenticationPolicy::class;

    public function resolveEndpoint(): string
    {
        return '/policy/authentication';
    }
}
