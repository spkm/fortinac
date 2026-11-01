<?php

namespace spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the information used to create an Endpoint Compliance Policy: GET /policy/endpoint-compliance/supporting-info.
 */
class GetEndpointCompliancePolicySupportingInfoRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/supporting-info';
    }
}
