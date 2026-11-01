<?php

namespace spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy;

use spkm\FortiNac\Data\Policy\EndpointCompliancePolicy;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Endpoint Compliance Policy records matching the supplied filter: GET /policy/endpoint-compliance/{id}.
 */
class GetEndpointCompliancePolicyRequest extends ItemRequest
{
    protected ?string $dto = EndpointCompliancePolicy::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/'.$this->id;
    }
}
