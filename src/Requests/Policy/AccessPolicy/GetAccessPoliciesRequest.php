<?php

namespace spkm\FortiNac\Requests\Policy\AccessPolicy;

use spkm\FortiNac\Data\Policy\AccessPolicy;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Access Policy records matching the supplied filter: GET /policy/access.
 */
class GetAccessPoliciesRequest extends ListRequest
{
    protected ?string $dto = AccessPolicy::class;

    public function resolveEndpoint(): string
    {
        return '/policy/access';
    }
}
