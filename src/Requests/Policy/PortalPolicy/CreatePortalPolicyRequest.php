<?php

namespace spkm\FortiNac\Requests\Policy\PortalPolicy;

use spkm\FortiNac\Data\Policy\PortalPolicy;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new portal policy record, updating instead if the supplied profile has a DBID of one that already exists: POST /policy/portal.
 */
class CreatePortalPolicyRequest extends WriteRequest
{
    protected ?string $dto = PortalPolicy::class;

    public function resolveEndpoint(): string
    {
        return '/policy/portal';
    }
}
