<?php

namespace spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy;

use spkm\FortiNac\Data\Policy\EndpointCompliancePolicy;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Endpoint Compliance Policy record, updating instead if the supplied profile has a DBID of one that already exists: POST /policy/endpoint-compliance.
 */
class CreateEndpointCompliancePolicyRequest extends WriteRequest
{
    protected ?string $dto = EndpointCompliancePolicy::class;

    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance';
    }
}
