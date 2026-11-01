<?php

namespace spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy;

use spkm\FortiNac\Data\Policy\EndpointCompliancePolicy;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Endpoint Compliance Policy records matching the supplied filter: GET /policy/endpoint-compliance.
 */
class GetEndpointCompliancePoliciesRequest extends ListRequest
{
    protected ?string $dto = EndpointCompliancePolicy::class;

    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance';
    }
}
