<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationPolicy;

use spkm\FortiNac\Data\Policy\AuthenticationPolicy;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Authentication Policy records matching the supplied filter: GET /policy/authentication.
 */
class GetAuthenticationPoliciesRequest extends ListRequest
{
    protected ?string $dto = AuthenticationPolicy::class;

    public function resolveEndpoint(): string
    {
        return '/policy/authentication';
    }
}
