<?php

namespace spkm\FortiNac\Requests\Policy\PortalPolicy;

use spkm\FortiNac\Data\Policy\PortalPolicy;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of portal policy records matching the supplied filter: GET /policy/portal.
 */
class GetPortalPoliciesRequest extends ListRequest
{
    protected ?string $dto = PortalPolicy::class;

    public function resolveEndpoint(): string
    {
        return '/policy/portal';
    }
}
