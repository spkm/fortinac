<?php

namespace spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the supplied Endpoint Compliance Policy: POST /policy/endpoint-compliance/enable.
 *
 * Parameters: id.
 */
class EnableManyEndpointCompliancePoliciesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/enable';
    }
}
