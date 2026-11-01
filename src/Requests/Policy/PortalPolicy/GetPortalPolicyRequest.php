<?php

namespace spkm\FortiNac\Requests\Policy\PortalPolicy;

use spkm\FortiNac\Data\Policy\PortalPolicy;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of portal policy records matching the supplied filter: GET /policy/portal/{id}.
 */
class GetPortalPolicyRequest extends ItemRequest
{
    protected ?string $dto = PortalPolicy::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/portal/'.$this->id;
    }
}
