<?php

namespace spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Disables the supplied Endpoint Compliance Policy: POST /policy/endpoint-compliance/disable.
 *
 * Parameters: id.
 */
class DisableManyEndpointCompliancePoliciesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/disable';
    }
}
